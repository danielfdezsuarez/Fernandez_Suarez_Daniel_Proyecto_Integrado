<!DOCTYPE html>
<html lang="en">
<?php
  
  session_start();
    
  include 'conexion.php';
    
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }

?>
<?php include("tema2.php"); ?>

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
           url: "array.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       var options = {'title':'Países',
                     'width':400,
                     'height':240};
       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
       chart.draw(data, options);
     }
     
     google.charts.setOnLoadCallback(drawChart2);
     function drawChart2() {
       var jsonData = $.ajax({
           url: "array2.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       var options = {'title':'Club o Selección',
                     'width':400,
                     'height':240};
       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
       chart.draw(data, options);
     }
     
     google.charts.setOnLoadCallback(drawChart3);
     function drawChart3() {
       var jsonData = $.ajax({
           url: "array3.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       var options = {'title':'Continentes',
                     'width':400,
                     'height':240};

       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
       chart.draw(data, options);
     }
         
     google.charts.setOnLoadCallback(drawChart4);
     function drawChart4() {
       var jsonData = $.ajax({
           url: "array4.php",
           dataType: "json",
           async: false
           }).responseText;
       // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
       var options = {'title':'Equipos',
                     'width':400,
                     'height':240};

       // Instantiate and draw our chart, passing in some options.
       var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
       chart.draw(data, options);
     }
        
     </script>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/<?php echo $tema;?>.css">
    
     <title>DASHBOARD</title>
     
     <style>
        <?php include 'css/logo.css'; ?>
        <?php include 'css/grafica.css'; ?>
     </style>
</head>

<body>
    <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
    </header>
    
    <?php include 'logo.php'; ?>
    <table>
        <tr>
            <td><div id="chart_div" class="grafica"></div></td>
            <td><div id="chart_div2" class="grafica"></div></td>
        </tr>
        <tr>
            <td><div id="chart_div3" class="grafica"></div></td>
            <td><div id="chart_div4" class="grafica"></div></td>
        </tr>
    </table>                      
    
</body>

</html>