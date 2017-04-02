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
    <title>INSERTAR EQUIPO</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
        fieldset img{
            max-height: 300px;
            max-width: 00px;  
        }
        fieldset{
            width: 500px;  
        }
        <?php include 'css/body.css'; ?>
        <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="camisetas.php"><button>CAMISETAS</button></a>
        <a href="equipos.php"><button>EQUIPOS</button></a>
        <a href="insertar_camiseta.php"><button>INSERTAR CAMISETA</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_equipo"])) : ?>
      
        <form action="insertar_equipo.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EQUIPO</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_equipo"/>
            <!--<span>ID_Equipo:</span><input type="number" name="id_equipo" required><br>-->
            <span>Club/Selección:</span>
              <input type="radio" name="club_seleccion" value="club" value="seleccion">
              <input type="radio" name="club_seleccion" value="seleccion" required><br>
            <span>Nombre:</span><input type="text" name="nombre" required><br>
            <span>País:</span><input type="text" name="pais"><br>
            <span>Continente:</span><input type="text" name="continente"><br>
            <span>Imagen_eq:</span><input type="file" name="imagen_eq"><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
            
      <?php else: ?>      
            
      <?php
        $tmp_file = $_FILES['imagen_eq']['tmp_name'];
        $target_dir = "img/";
        $target_fi = strtolower($target_dir . basename($_FILES['imagen_eq']['name']));
        $valid= true;
        if (file_exists($target_fi)) {
          echo "Sorry, file already exists.";
          $valid = false;
        }
        //Check the size of the file. Up to 2Mb
        if ($_FILES['imagen_eq']['size'] > (2048000)) {
                $valid = false;
                echo 'Oops!  Your file\'s size is to large.';
            }
        //Check the file extension: We need an image not any other different type of file
        $file_extension = pathinfo($target_fi, PATHINFO_EXTENSION); // We get the entension
        if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
          $valid = false;
          echo "Only JPG, JPEG, PNG & GIF files are allowed";
        }
        if ($valid) {
          //Put the file in its place
          move_uploaded_file($tmp_file, $target_fi);
          echo "Imagen añadida";
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          $connection->set_charset("uft8");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //INSERTING THE NEW PRODUCT
          
          $id_equipo=$_POST['id_equipo'];
          $club_seleccion=$_POST['club_seleccion'];
          $nombre=$_POST['nombre'];
          $pais=$_POST['pais'];
          $continente=$_POST['continente'];
          
          $query3="INSERT INTO equipo VALUES('$id_equipo', '$club_seleccion', '$nombre', '$pais', '$continente', '$target_fi')";
          if ($result = $connection->query($query3)) {
              echo "Equipo añadido correctamente";
              header("Refresh:2; url=panel_admin.php");
          } else {
          echo "Fallo insert equipo";
          exit();
          }
          
        }
      ?>

      <?php endif ?>      
            
  </body>
</html>