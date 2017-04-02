<?php
  session_start();
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/usuarios.css">
    <title>EQUIPOS</title>
    <style>
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="insertar_camiseta.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
    
      <?php include 'logo.php'; ?>
      
    <?php
      $connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
      if ($result = $connection->query("select * from camiseta;")) {
          //printf("<p>The select query returned %d rows.</p>", $result->num_rows);
          echo "<br>";
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <!--<th>ID_C</th>-->
          <th>Jugador</th>
          <th>Dorsal</th>
          <th>Marca</th>
          <th>Publicidad</th>
          <th>Temporada</th>
          <th>Competición</th>
          <th>Img_cam</th>
          <th>Observaciones</th>
          <th>Editar_cam</th>
          <th>Borrar_cam</th>
            
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
             echo "<tr>";
              /*$id_cami=$obj->id_camiseta;
              echo "<td>".$obj->id_camiseta."</a></td>";
              //echo "<td>".$obj->id_camiseta."</td>";*/
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
              $ruta2 = $obj->imagen;
              echo "<td><img src='$ruta2'></td>";
              echo "<td>".$obj->observaciones."</td>";
              echo "<td>
                        <form method='get'>
                          <a href='editar_camiseta.php?id=$obj->id_camiseta'>
                            <img src='editar.png';/>
                          </a>
                        </form></td>";
              echo "<td>
                        <form method='get'>
                          <a href='borrar_camiseta.php?id=$obj->id_camiseta'>
                            <img src='borrar.png';/>
                          </a>
                        </form></td>";
              echo "</tr>";
          }
          
          $result->close();
          unset($obj);
          unset($connection);
      }
    ?>
  </body>
</html>