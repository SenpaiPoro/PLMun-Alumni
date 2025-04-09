fetch("../config/chartcode.php")
  .then(response => response.json())
  .then(data => {
    localStorage.setItem("chartData", JSON.stringify(data));
  });

fetch("../config/chartcode.php")
  .then(response => response.json())
  .then(data => {
    // Process data for both charts
    const allUsersData = processChartData(data.all_users);
    const college_workers = processChartDataWorker(data.college_workers);
    const collegeUsersData = processChartData(data.college_users);
    const all_workers = processChartDataWorker(data.all_workers);

    // Create charts
    createChart('college_workers', college_workers, data.college_name + ' Status', 'pie');
    createChart('allUsersChart', allUsersData, ' All Alumni Programs', 'bar');
    createChart('collegeUsersChart', collegeUsersData, data.college_name + ' Alumni' ,'bar');
    createChart('all_workers', all_workers, ' Status', 'pie');
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


function processChartDataWorker(rawData) {
  const statusCount = {};

  // Count valid WorkStatus values only (exclude null or empty)
  rawData.forEach(item => {
    if (item.WorkStatus && item.WorkStatus.trim() !== "") { 
      statusCount[item.WorkStatus] = (statusCount[item.WorkStatus] || 0) + 1;
    }
  });

  const workers = Object.keys(statusCount); // Get unique non-null WorkStatus values

  return {
    labels: workers,
    datasets: [{
      label: 'Workers Status',
      data: workers.map(WorkStatus => statusCount[WorkStatus]),
      backgroundColor: workers.map((_, i) => 
        `hsl(${(i * 360 / workers.length)}, 70%, 50%)`),
      borderWidth: 1
    }]
  };
}


// Chart creation function
function createChart(canvasId, chartData, title, type) {
    new Chart(document.getElementById(canvasId), {
      type: type,
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