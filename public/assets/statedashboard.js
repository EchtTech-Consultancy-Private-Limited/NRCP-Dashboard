Highcharts.chart('state-dashboard-data', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -45],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    exporting: {
       enabled: false
   },
   credits: {
    enabled: false
 },
    yAxis: {
        min: 0,
        title: {
            text: 'Values',
            enabled:false
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        enabled: false,
        pointFormat: ''
    },
    series: [{
        name: '',
        colors: [
            '#158bec'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['Jan', 1000],
            ['Fab', 2500],
            ['Mar', 3000],
            ['Apr', 3500],
            ['May', 3800],
            ['Jun', 4000],
            ['Jul', 4300],
            ['Aug', 4500],
            ['Sep', 5000],
            ['Oct', 5300],
            ['Nov', 5700],
            ['Dec', 6000],
            
        ],
        dataLabels: {
            enabled: true,
            rotation: 0,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
          //   format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
 });