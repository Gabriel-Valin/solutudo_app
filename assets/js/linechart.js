
var ctx = document.getElementById('line-chart');
var chartG = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Memorias Totais', 'Homenagens'],
        datasets: [{
            label: 'Dados GNM',
            data: [
                1, 2

            ],
            borderWidth: 1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

            barThickness: 30,
            maxBarThickness: 30,
            barPercentage: 2.0
        },

        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    categoryPercentage: 10,
                    barPercentage: 10
                }
            }],
            xAxes: [{
                ticks: {
                    beginAtZero: true,

                }
            }]
        }
    }
});
