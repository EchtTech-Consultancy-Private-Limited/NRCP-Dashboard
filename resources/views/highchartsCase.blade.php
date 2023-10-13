<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cases by Age Group in India (Based on Male and Female)</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Cases by Age Group in India'
        },
        xAxis: {
            categories: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61+'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Cases',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: 'Male',
            data: [500, 400, 300, 200, 150, 100, 50]
        }, {
            name: 'Female',
            data: [600, 500, 400, 300, 250, 200, 100]
        }]
    });
});

     </script>
</head>
<body>
    <h1>Cases by Age Group in India (Based on Male and Female)</h1>
    <div id="chartContainer" style="height: 400px;"></div>
    <script src="script.js"></script>
</body>
</html>
