<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Dog Bite Cases by Age Group'
        },
        xAxis: {
            categories: ['0-10', '11-20', '21-30'].reverse(), // Reverse the order of categories
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
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cases',
            data: [200, 150, 100].reverse() // Reverse the order of data points
        }]
    });
});

</script>

</head>
<body>
    <h1>Age-wise Dog Bite Cases Statistics</h1>

    <div id="chartContainer" style="height: 400px;"></div>
</body>
</html>
