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
    <title>BORRAR USUARIO</title>
    <style>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      
      <?php include 'logo.php'; ?>
      
      <?php
      
      if (!isset($_GET['id'])) {
          echo "No client selected";
      } else {
          $cliente=$_GET['id'];
          
      include 'conexion.php';
          
      ?>

      <?php
          $consulta="DELETE FROM usuario WHERE id_user=".$_GET['id'];
          
          $result=mysqli_query($connection,$consulta);
          
          if($result==false){
              echo "Error consulta";
          } else {
              echo "Usuario borrado correctamente";
              header("Refresh:2; url=usuarios.php");
          }
      }
      ?>
      
  </body>
</html>