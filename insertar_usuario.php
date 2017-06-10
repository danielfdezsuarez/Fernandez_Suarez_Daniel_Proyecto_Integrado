<?php
  session_start();
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>
<?php include("tema2.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/<?php echo $tema;?>.css">
    <title>INSERTAR USUARIO</title>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
      fieldset{
        max-width: 400px;  
      }
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="usuarios.php"><button>USUARIOS</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["user"])) : ?>
        <?php
          include 'conexion.php';

        ?>
      
          <form action="insertar_usuario.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>INSERTAR USUARIO</legend>
                    <input type="hidden" name="id_user"/>
                    <span>Usuario:</span><input type="text" name="user" required><br>
                    <span>Password:</span><input type="password" name="password" required><br>
                    <span>Mail:</span><input type="email" name="mail"><br>
                    <span><input type="submit" value="Enviar"><br>
              </fieldset>
          </form>

      <?php else: ?>      
              
      <?php
          include 'conexion.php';
          
          $id_user=$_POST['id_user'];
          $user=$_POST['user'];
          $password=$_POST['password'];
          $mail=$_POST['mail'];
          
          $query="INSERT INTO usuario VALUES('', '$user', md5('$password'), '$mail', 'predeterminado')";
          if ($result = $connection->query($query)) {
              echo "Usuario añadido correctamente";
              header("Refresh:2; url=usuarios.php");
          } else {
           echo "Fallo insert usuario";
           exit();
          }
          
      ?>
     
      <?php endif ?>   
    
  </body>
</html>