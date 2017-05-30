<!DOCTYPE html>
<html lang="en">
<?php
  
  session_start();
    
    $connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
    
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }

?>

<head>
  <!--Load the AJAX API-->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <script type="text/javascript">
     // Load the Visualization API and the piechart package.
     google.charts.load('current', {'packages':['corechart']});
     // Set a callback to run when the Google Visualization API is loaded.
     google.charts.setOnLoadCallback(drawChart);
     
     function drawChart() {
       var jsonData = $.ajax({
           url: "datos3.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
       chart.draw(data, {width: 400, height: 240});
     }
     
     google.charts.setOnLoadCallback(drawChart2);
     function drawChart() {
       var jsonData = $.ajax({
           url: "datos2.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
       chart.draw(data, {width: 400, height: 240});
     }
        
     </script>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>
    
    <div id="chart_div2"></div>
<h1>lcl</h1>
    <div id="chart_div"></div>
                                 

 

</body>

</html>