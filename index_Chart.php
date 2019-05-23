<?php
$connection = mysqli_connect('localhost', 'root', '', 'api');
$result = mysqli_query($connection, "SELECT * FROM users");

 ?>

  <!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Task</title>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart', 'bar']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {

            var button = document.getElementById('change-chart');
            var chartDiv = document.getElementById('chart_div');

              var data = google.visualization.arrayToDataTable([
                  [ 'Country','Sports', 'Technology'],
                  <?php
                      if(mysqli_num_rows($result)> 0){

                          while($row = mysqli_fetch_array($result)){

                            echo "['".$row['country']."', '".$row['id']."', '".$row["category"]."'],";

                          }
                      }
                  ?>


              ]);

        var materialOptions = {
          width: 900,
          chart: {
            title: 'Cognitev Internship Evaluation Task ',

          },

        };

        var classicOptions = {
          width: 900,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Cognitev Internship Evaluation Task',

        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));

        }


        drawMaterialChart();
    };
    </script>
  </head>
  <body>
    <br><br>
    <div id="chart_div" style="width: 800px; height: 500px;"></div>
  </body>
</html>
