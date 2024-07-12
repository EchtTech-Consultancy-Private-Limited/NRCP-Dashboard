//  Yearly wise Monthly Report
$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: BASE_URL + "states/state-highchart",
        success: function(data) {
            stateHighchart(data);
        }
    });
});

$(document).on('change', '.state_dashboard_filter', function() {
    let stateId = $('#state-id').find(":selected").val();
    const stateMonth = $('#state-month').find(":selected").val();
    const stateYear = $('#state-year').find(":selected").val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "states/state-highchart",
        data: {
            'state_id': stateId,
            'state_month' : stateMonth,
            'state_year' : stateYear
        },
        success: function(data) {
            $("#sum_total_health_animal").text(data.totalCard?.sum_total_health_animal ?? '0');
            $("#total_health_facilities_submitted").text(data.totalCard?.total_health_facilities_submitted ?? '0');
            $("#total_patients").text(data.totalCard?.total_patients ?? '0');
            $("#suspected_death_reports").text(data.totalCard?.suspected_death_reports ?? '0');
            $("#availability_ars").text(data.totalCard?.availability_ars ?? '0');
            $("#availability_arv").text(data.totalCard?.availability_arv ?? '0');            
            stateHighchart(data);
        }
    });
});

function stateHighchart(data)
{
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
            data: data.yearlyMonthReport,
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
}