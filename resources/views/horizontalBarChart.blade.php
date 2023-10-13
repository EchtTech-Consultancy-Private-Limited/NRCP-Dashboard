<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death by Age Group in India</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Death by Age Group in India'
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
                text: 'Number of Deaths',
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
            data: [19,18,17]
        }, {
            name: 'Female',
            data: [5]
        }]
    });
});

     </script>
</head>
<body>
    <h1>Death by Age Group in India (Based on Male and Female)</h1>
    <div id="chartContainer" style="height: 400px;"></div>
    <script src="script.js"></script>
</body>
</html>
