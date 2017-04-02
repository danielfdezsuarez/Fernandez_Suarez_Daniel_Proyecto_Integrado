<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGOUT</title>
    <style>
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <?php include 'logo.php'; ?>
      <?php
        session_start();
        if (isset($_SESSION["user"])) {
          session_destroy();
          header("Location: index.php");  
        } else {
        echo "Aún no has has iniciado sesión!";
        header("Refresh:1; url=index.php");
        }
      ?>    
  </body>
</html>