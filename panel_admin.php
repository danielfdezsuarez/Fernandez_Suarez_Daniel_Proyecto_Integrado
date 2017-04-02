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
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>PANEL ADMIN</title>
    <style>
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="camisetas.php"><button>CAMISETAS</button></a>
        <a href="equipos.php"><button>EQUIPOS</button></a>
        <a href="insertar_camiseta.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="alertas.php"><button>ALERTAS</button></a>
        <a href="usuarios.php"><button>USUARIOS</button></a>
        <a href="insertar_usuario.php"><button>INSERTAR USUARIO</button></a>
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
      
      if ($result = $connection->query("select * from camiseta join camiseta_equipo on camiseta.id_camiseta=camiseta_equipo.id_camiseta 
      join equipo on camiseta_equipo.id_equipo=equipo.id_equipo order by camiseta.id_camiseta;")) {
          //printf("<p>The select query returned %d rows.</p>", $result->num_rows);
          echo "<br>";
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <!--<th>ID_C</th>
          <th>ID_E</th>-->
          <th>Img_eq</th>
          <th>Club/Seleccion</th>
          <th>Nombre</th>
          <th>Pais</th>
          <th>Continente</th>
          <th>Jugador</th>
          <th>Dorsal</th>
          <th>Marca</th>
          <th>Publicidad</th>
          <th>Temporada</th>
          <th>Competición</th>
          <th>Img_cam</th>
          <th>Observaciones</th>
            
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              /*$id_cami=$obj->id_camiseta;
              echo "<td>".$obj->id_camiseta."</a></td>";
              //echo "<td>".$obj->id_camiseta."</td>";
              echo "<td>".$obj->id_equipo."</td>";*/
              $ruta = $obj->imagen_equipo;
              echo "<td><img src='$ruta'></td>";
              echo "<td>".$obj->club_seleccion."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->continente."</td>";
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
              $ruta2 = $obj->imagen;
              echo "<td><img src='$ruta2'></td>";
              echo "<td>".$obj->observaciones."</td>";
              echo "</tr>";
          }
          
          $result->close();
          unset($obj);
          unset($connection);
      }
    ?>
  </body>
</html>