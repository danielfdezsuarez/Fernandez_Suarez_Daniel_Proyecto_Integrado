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
        <a href="camisetas.php"><button>CAMISETAS</button></a>
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
      
      if ($result = $connection->query("select * from equipo;")) {
          //printf("<p>The select query returned %d rows.</p>", $result->num_rows);
          echo "<br>";
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <!--<th>ID_E</th>-->
          <th>Club/Seleccion</th>
          <th>Nombre</th>
          <th>Pais</th>
          <th>Continente</th>
          <th>Img_eq</th>
          <th>Editar_eq</th>
          <th>Borrar_eq</th>
            
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
              //echo "<td>".$obj->id_equipo."</td>";
              echo "<td>".$obj->club_seleccion."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->continente."</td>";
              $ruta = $obj->imagen_equipo;
              echo "<td><img src='$ruta'></td>";
              echo "<td>
                        <form method='get'>
                          <a href='editar_equipo.php?id=$obj->id_equipo'>
                            <img src='editar.png';/>
                          </a>
                        </form></td>";
              echo "<td>
                        <form method='get'>
                          <a href='borrar_equipo.php?id=$obj->id_equipo'>
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