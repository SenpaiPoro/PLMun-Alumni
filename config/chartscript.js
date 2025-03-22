const ctx = document.getElementById('myChart');

// Function to fetch data and create the chart
function fetchAndCreateChart(colleges) {
    fetch(`../config/chartcode.php?colleges=${colleges}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            createChart(data, 'bar');
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
}

// Function to create the chart
function createChart(chartData, type) {
    new Chart(ctx, {
        type: type,
        data: {
            labels: chartData.map(row => row.program),
            datasets: [{
                label: 'Alumni Graph',
                data: chartData.map(row => row.graduated),
                borderWidth: 1,
                backgroundColor: 'rgba(90, 229, 229, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)'
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