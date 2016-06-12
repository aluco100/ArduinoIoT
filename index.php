<?php
$data = "";
$link = mysqli_connect("173.194.238.124", "aluco100", "", "ardulioDB") or die(mysqli_error());
$query = "SELECT * from data";
$result = mysqli_query($link, $query);
while($lista = mysqli_fetch_assoc($result)){
    $data = $data."['".$lista["hour"]."',".$lista["sensor"]."],";
}

$data = substr($data, 0, -1);

mysqli_close($link);

//auto refreshing
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
      <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Intensity'],
          <?php echo$data; ?>
        ]);

        var options = {
          title: 'Fotoresistance sensor',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>