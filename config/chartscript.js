fetch("../config/chartcode.php")
  .then(response => response.json())
  .then(data => {
    // Process data for both charts
    const allUsersData = processChartData(data.all_users);
    const collegeUsersData = processChartData(data.college_users);
    
    // Create charts
    createChart('allUsersChart', allUsersData, 'All Alumni Programs');
    createChart('collegeUsersChart', collegeUsersData, data.college_name + ' Alumni');
    createChart('collegeUsersChart', collegeUsersData, `${data.college_users[0]?.colleges || 'Your College'} Alumni`);
  })
  .catch(error => console.error('Error:', error));

// Data processing function
function processChartData(rawData) {
  const programs = [...new Set(rawData.map(item => item.program))];
  const graduatedCount = {};
  
  // Count graduates per program
  rawData.forEach(item => {
    graduatedCount[item.program] = (graduatedCount[item.program] || 0) + 1;
  });
  
  return {
    labels: programs,
    datasets: [{
      label: 'Number of Graduates',
      data: programs.map(program => graduatedCount[program]),
      backgroundColor: programs.map((_, i) => 
        `hsl(${(i * 360 / programs.length)}, 70%, 50%)`),
      borderWidth: 1
    }]
  };
}

// Chart creation function
function createChart(canvasId, chartData, title) {
  new Chart(document.getElementById(canvasId), {
    type: 'bar',
    data: chartData,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: title,
          font: { size: 16 }
        },
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          title: { 
            display: true, 
            text: 'Number of Graduates' 
          }
        },
        x: {
          title: { 
            display: true, 
            text: 'Academic Program' 
          }
        }
      }
    }
  });
}