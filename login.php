<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
        <?php include 'css/body.css'; ?>
    </style>  
  </head>
  <body>
      
      <?php include 'logo.php'; ?>
      <style>
      <?php include 'css/logo.css'; ?>
      </style>  

    <?php
        if (isset($_POST["user"])) {
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          
          $consulta="select * from usuario where user='".$_POST["user"]."' and password=md5('".$_POST["password"]."')";
          
          if ($result = $connection->query($consulta)) {
              if ($result->num_rows===0) {
                echo "LOGIN INVALIDO";
                  var_dump($consulta);
              } else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["language"]="es";
                header("Location: panel_admin.php");
              }
          } else {
            echo "Wrong Query";
          }
      }
    ?>

    <form action="login.php" method="post">

      <p><input name="user" required></p>
      <p><input name="password" type="password" required></p>
      <p><input type="submit" value="Log In"></p>

    </form>



  </body>
</html>