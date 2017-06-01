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
    <title>BORRAR CAMISETA</title>
    <style>
        <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      
      <?php include 'logo.php'; ?><br>
      
      <?php
      
      if (!isset($_GET['id'])) {
          echo "No client selected";
      } else {
          $cliente=$_GET['id'];
      
      $imagen="";
          
      include 'conexion.php';
          
      if ($result3 = $connection->query("SELECT imagen FROM camiseta WHERE id_camiseta=".$_GET['id'].";")) {
           $obj = $result3->fetch_object();
           $imagen=$obj->imagen;
           $result3->close();
      }    
      ?>

      <?php
          $consulta="DELETE FROM camiseta_equipo WHERE id_camiseta=".$_GET['id'];
          $consulta2="DELETE FROM camiseta WHERE id_camiseta=".$_GET['id'];
          
          $result=mysqli_query($connection,$consulta);
          $result2=mysqli_query($connection,$consulta2);
          
          if($result==false){
              echo "Error consulta";
          } else {
              unlink($imagen);
              echo "Camiseta borrada correctamente";
              header("Refresh:2; url=panel_admin.php");
          }
      }
      ?>
      
  </body>
</html>