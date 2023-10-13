<html>
  <head>
    <script type="text/javascript" src="{{ asset('gstatic.com_charts_loader.js') }}"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Percentage'],
          ['Male', {{ $male_percentage }}],
          ['Female', {{ $female_percentage }}]
        ]);

        var options = {
          title: 'Cases by Gender in india n=('+{{ $total }}+')',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Percentage'],
        ['Male', {{ $female_percentage }}],
        ['Female', {{ $male_percentage }}]
      ]);

      var options = {
        title: 'Death by Gender in india n=('+{{ $total }}+')',
      };

      var chart = new google.visualization.PieChart(document.getElementById('piecharts'));

      chart.draw(data, options);
    }
  </script>


<style>
    .row{
        display:flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .col-md-6{
        width: 50%
    }

        path.highcharts-point.highcharts-color-1 {
    fill: #e45922 !important;
}

path.highcharts-point.highcharts-color-0 {
    fill: #712980 !important;
}

</style>

  </head>
  <body>
    {{-- <h1>Google Pie Chart Example</h1> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>

            <div class="col-md-6">
                <div id="piecharts" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>

  </body>
</html>
