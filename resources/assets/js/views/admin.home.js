import Chart from 'chart.js'
import JVectormap from 'jvectormap';
require('./jquery-jvectormap-world-mill');

$(function () {

    let ctx = document.getElementById("salesChart");
    let deviceChartCanvas = document.getElementById("DeviceChart");

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: window.MonthlyVisitors_Days,
            datasets: [
                {
                    label: "Digital Goods",
                    data: window.MonthlyVisitors_Count,
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
                        beginAtZero: true
                    }
                }]
            },
        }
    });

    $('#world-map-markers').vectorMap({
        map: 'world_mill',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: 'transparent',
        regionStyle: {
            initial: {
                fill: 'rgba(210, 214, 222, 1)',
                "fill-opacity": 1,
                stroke: 'none',
                "stroke-width": 0,
                "stroke-opacity": 1
            },
            hover: {
                "fill-opacity": 0.7,
                cursor: 'pointer'
            },
            selected: {
                fill: 'yellow'
            },
            selectedHover: {}
        },
        markerStyle: {
            initial: {
                fill: '#00a65a',
                stroke: '#111'
            }
        },
        markers: window.Visitors_GEO
        /*[
         {latLng: [41.90, 12.45], name: 'Vatican City'},
         {latLng: [43.73, 7.41], name: 'Monaco'},
         {latLng: [-0.52, 166.93], name: 'Nauru'},
         {latLng: [-8.51, 179.21], name: 'Tuvalu'},
         {latLng: [43.93, 12.46], name: 'San Marino'},
         {latLng: [47.14, 9.52], name: 'Liechtenstein'},
         {latLng: [7.11, 171.06], name: 'Marshall Islands'},
         {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
         {latLng: [3.2, 73.22], name: 'Maldives'},
         {latLng: [35.88, 14.5], name: 'Malta'},
         {latLng: [12.05, -61.75], name: 'Grenada'},
         {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
         {latLng: [13.16, -59.55], name: 'Barbados'},
         {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
         {latLng: [-4.61, 55.45], name: 'Seychelles'},
         {latLng: [7.35, 134.46], name: 'Palau'},
         {latLng: [42.5, 1.51], name: 'Andorra'},
         {latLng: [14.01, -60.98], name: 'Saint Lucia'},
         {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
         {latLng: [1.3, 103.8], name: 'Singapore'},
         {latLng: [1.46, 173.03], name: 'Kiribati'},
         {latLng: [-21.13, -175.2], name: 'Tonga'},
         {latLng: [15.3, -61.38], name: 'Dominica'},
         {latLng: [-20.2, 57.5], name: 'Mauritius'},
         {latLng: [26.02, 50.55], name: 'Bahrain'},
         {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
         ]*/
    });

    let pieChart = new Chart(deviceChartCanvas, {
        type: 'doughnut',
        data: {
            labels: window.OsChartData_Labels,
            datasets: [
                {
                    data: window.OsChartData_Counts,
                    backgroundColor: window.OsChartData_Colors,
                    hoverBackgroundColor: window.OsChartData_Colors
                }]
        },
        options: {
            animation: {
                animateScale: true
            }
        }
    });

});