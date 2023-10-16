<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Population Pyramid Chart</title>
    <!-- Include ApexCharts library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <!-- Chart Container -->
    <div id="chart" style="height: 500px;"></div>




    <!-- JavaScript Code -->
    <script>
      $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "{{ url('horizontalBarChartcaseAjax') }}",
        type: "get",
        success: function(result) {
            var data = result; // Assuming 'result' contains the data you provided

            var categories = data.map(item => item.age_group);

            var males = {
                name: 'Males',
                data: data.map(item => item.male_percentage)
            };

            var females = {
                name: 'Females',
                data: data.map(item => -item.female_percentage)
            };

            var options = {
                series: [males, females],
                chart: {
                    type: 'bar',
                    height: 440,
                    stacked: true
                },
                colors: ['#ed855a', '#712980'],
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '80%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 1,
                    colors: ["#fff"]
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: false
                        }
                    }
                },
                yaxis: {
                    min: -10,
                    max: 10,
                    title: {
                        // text: 'Age',
                    },
                },
                tooltip: {
                    shared: false,
                    x: {
                        formatter: function(val) {
                            return val
                        }
                    },
                    y: {
                        formatter: function(val) {
                            return Math.abs(val) + "%"
                        }
                    }
                },
                title: {
                    text: 'Case by age group in india'
                },
                xaxis: {
                    categories: categories,
                    title: {
                        text: 'Percent'
                    },
                    labels: {
                        formatter: function(val) {
                            return Math.abs(Math.round(val)) + "%"
                        }
                    }
                },
            };

            var chart = new ApexCharts(document.querySelector("#pyramid_chart"), options);
            chart.render();
        }
    });
});

    </script>
</body>

</html>
