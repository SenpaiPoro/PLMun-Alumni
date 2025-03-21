const ctx = document.getElementById('myChart');

fetch("../config/chartcode.php")
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

function createChart(chartData, type) {
    new Chart(ctx, {
        type: type,
        data: {
            labels: chartData.map(row => row.program), // Use 'program' for labels
            datasets: [{
                label: 'Alumni Graduated',
                data: chartData.map(row => row.graduated), // Use 'graduated' for data
                borderWidth: 1,
                backgroundColor: 'rgba(90, 229, 229, 0.2)', // Add background color
                borderColor: 'rgba(75, 192, 192, 1)' // Add border color
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