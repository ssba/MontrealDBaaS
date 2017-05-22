import Chart from 'chart.js'

$(function () {

   // let salesChartCanvas = $("#salesChart").get(0).getContext("2d");

    let ctx = document.getElementById("salesChart");
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["01", "02", "03", "04", "05", "06", "07", "07.01.2016", "08.01.2016", "09.01.2016", "09.01.2016"],
            datasets: [
                    {
                        label: "Digital Goods",
                        data: [2800, 48, 40, 19, 86, 27, 9000,1000, 500 , 0 , 100 ],
                        fill: true,
                        borderColor: "rgba(60,141,188,1)",
                        pointBackgroundColor: "#3b8bba",
                        backgroundColor: "#3b8bba",
                        pointBorderColor: "#3b8bba",
                        pointRadius: 1,
                        pointBorderWidth: 1,
                        pointHitRadius: 10,
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#3b8bba",
                        pointHoverBorderColor: "#3b8bba",
                        pointHoverBorderWidth: 2,
                    }
            ]
        },
        options: {
            responsive: true, //Boolean - whether to make the chart responsive to window resizing
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
        }
    });
});