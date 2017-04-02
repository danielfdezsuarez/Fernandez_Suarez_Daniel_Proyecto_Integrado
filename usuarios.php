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
    <title>USUARIOS</title>
    <style>
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
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
      
      if ($result = $connection->query("select * from usuario;")) {
          //printf("<p>The select query returned %d rows.</p>", $result->num_rows);
          echo "<br>";
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <!--<th>ID_USER</th>-->
          <th>User</th>
          <!--<th>Password</th>-->
          <th>Mail</th>
          <th>Borrar</th>
          <th>Editar_admin</th>
            
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              //echo "<td>".$obj->id_user."</a></td>";
              echo "<td>".$obj->user."</td>";
              //echo "<td>".$obj->password."</td>";
              echo "<td>".$obj->mail."</td>";
              echo "<td>
                        <form method='get'>
                          <a href='borrar_usuario.php?id=$obj->id_user'>
                            <img src='borrar.png';/>
                          </a>
                        </form></td>";
              echo "<td>
                        <form method='get'>
                          <a href='editar_usuario.php?id=$obj->id_user'>
                            <img src='editar.png';/>
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