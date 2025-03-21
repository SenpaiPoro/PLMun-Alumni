const ctx = document.getElementById('myChart');

fetch("chartcode.php")
.then((response) => {
    return response.json();
})
.then((data)=> {
    createChart(data, 'bar')
});

function createChart(charData, type){
new Chart(ctx, {
  type: type,
  data: {
    labels: charData.map(row => row.program),
    datasets: [{
      label: 'Alumni',
      data: charData.map(row => row.graduated),
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
}