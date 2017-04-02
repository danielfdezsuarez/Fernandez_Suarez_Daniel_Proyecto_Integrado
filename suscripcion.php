<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
        fieldset {
            width: 300px;  
        }
        <?php include 'css/body.css'; ?>
        <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_equipo"])) : ?>

        <?php 
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //var_dump($cod);
        
        $query="SELECT * from equipo where id_equipo='$cod'";
            if ($result = $connection->query($query)) {
                $obj = $result->fetch_object();
                $id_equipo=$obj->id_equipo;
            }
        ?>
      
        <form action="suscripcion.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>SUSCRIPCION</legend>
            <input type="hidden" name="id_alerta"/>
            <input type="hidden" name="id_equipo" value="<?php echo $cod; ?>"/>
            <span>Mail:</span><input type="email" name="mail"><br>
            <br><span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>

      <?php else: ?>
        
        <?php
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          $connection->set_charset("uft8");
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          
          $id_alerta=$_POST['id_alerta'];
          $id_equipo=$_POST['id_equipo'];
          $mail=$_POST['mail'];
          
          $query2="INSERT INTO alerta VALUES('', '$id_equipo', '$mail')";
            //var_dump($query2);
            echo "Te has suscrito satisfactoriamente";
            if ($result = $connection->query($query2)) {
                header("Refresh:2; url=index.php");
          } else {
          echo "Fallo insert query";
          exit();
          }
        ?>
            
      <?php endif ?>

  </body>
</html>