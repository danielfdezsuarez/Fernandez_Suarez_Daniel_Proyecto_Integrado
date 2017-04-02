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
    <title>EDITAR ALERTA</title>
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
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="alertas.php"><button>ALERTAS</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_alerta"])) : ?>

        <?php
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM alerta WHERE id_alerta='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            //$id_alerta=$obj->id_alerta;
            $id_equipo=$obj->id_equipo;
            $mail=$obj->mail;
        }
        ?>

        <form action="editar_alerta.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR ALERTA</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_alerta"/>
            <span>Equipo:</span><select name="id_equipo" required><br>
                        <?php
                          $connection = new mysqli("localhost", "root", "123456", "camisetas");
                          if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                         }
                         $result = $connection->query("SELECT id_equipo,nombre FROM equipo");
                         if ($result) {
                           while ($obj=$result->fetch_object()) {
                              $valor = $obj->id_equipo;
                              echo "<option  value='$valor'";
                              if ($valor==$id_equipo) {
                                  echo " selected ";
                              }
                              echo ">";                              
                              echo $obj->nombre;
                              echo "</option>";
                           }
                         } else {
                           printf("Query failed: %s\n", $connection->connect_error);
                           exit();
                         }
                        ?>
                        </select><br>
              <span>Mail:</span><input type="text" name="mail" value="<?php echo $mail; ?>"><br>
	       <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>

      <?php else: ?>

        <?php
        
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $id_alerta=$_POST['id_alerta'];
        $id_equipo=$_POST['id_equipo'];
        $mail=$_POST['mail'];
                    
        $consulta="Update alerta SET 
        id_alerta='$id_alerta',
        id_equipo='$id_equipo',
        mail='$mail' WHERE id_alerta='$id_alerta'";
            
        $result = $connection->query($consulta);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($consulta);
        } else {
            echo "Alerta actualizada correctamente";
            header("Refresh:2; url=alertas.php");
        }
        
        ?>

      <?php endif ?>

  </body>
</html>