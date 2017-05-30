<?php
  session_start();
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>
<?php
        $cod=$_SESSION["user"];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM usuario WHERE user='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $user=$obj->user;
            $tema=$obj->tema;
        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/<?php echo $tema;?>.css">
    <title>USUARIOS</title>
    <style>
      <?php include("elegirtema.php"); ?>
      <?php include 'css/logo.css'; ?>
        img {
            height: 50px;
            width: 50px;
        }
        td {
            text-align: center;
            vertical-align: middle;
        }
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
          
      <a href="usuariospdf.php"><img src="impdf.png" style="width:25px;height:25px"></a>

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
  <footer>
      
      <form action="usuarios.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR temitaRIO</legend>
            <span>Tema:</span>
              <select name="tema"><br>
                  <option value="predeterminado">Predeterminado</option>
                  <option value="negro">Nocturno</option>
                  <option value="verde">Verde</option>
              </select>
            <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
  </footer>
</html>