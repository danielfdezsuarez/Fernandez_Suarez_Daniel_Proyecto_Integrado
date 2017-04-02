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
    <title>EDITAR EQUIPO</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
        fieldset img {
            max-height: 200px;
            max-width: 200px;  
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
        <a href="insertar_camiseta.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_equipo"])) : ?>

        <?php
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM equipo WHERE id_equipo='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $id_equipo=$obj->id_equipo;
            $club_seleccion=$obj->club_seleccion;
            $nombre=$obj->nombre;
            $pais=$obj->pais;
            $continente=$obj->continente;
            $imagen_equipo=$obj->imagen_equipo;
            $ruta=$obj->imagen_equipo;
            //echo var_dump($ruta);
        }
        ?>

        <form action="editar_equipo.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR EQUIPO</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_equipo"/>
            <span>Club/Selección:</span>
                <input type="radio" name="club_seleccion" value="club" class="radio" <?php echo ($club_seleccion=='club') ? 'checked="checked"' : ''; ?> required/>
                <input type="radio" name="club_seleccion" value="seleccion" class="radio" <?php echo ($club_seleccion=='seleccion') ? 'checked="checked"' : ''; ?> required/><br>
            <span>Nombre:</span><input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
            <span>País:</span><input type="text" name="pais" value="<?php echo $pais; ?>"><br>
            <span>Continente:</span><input type="text" name="continente" value="<?php echo $continente; ?>"><br>
            <span>Imagen_eq:</span><input type="file" name="imagen_equipo"><br><img src='<?php echo $ruta; ?>'><br>
	        <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>

      <!-- DATA IN $_POST['mail']. Coming from a form submit -->
      <?php else: ?>

        <?php
            
        $valid= true;
        //var_dump($_FILES);
            
        if ($_FILES['imagen_equipo']['name']!="") {
            $tmp_file = $_FILES['imagen_equipo']['tmp_name'];
            $target_dir = "img/";
            $target_file = strtolower($target_dir . basename($_FILES['imagen_equipo']['name']));

            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $valid = false;
            }
            //Check the size of the file. Up to 2Mb
            if ($_FILES['imagen_equipo']['size'] > (2048000)) {
                    $valid = false;
                    echo 'Oops!  Your file\'s size is to large.';
                }
            //Check the file extension: We need an image not any other different type of file
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
            if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
              $valid = false;
              echo "Only JPG, JPEG, PNG & GIF files are allowed";
            }    
        }
        
        if ($valid) {
          //Put the file in its place
          move_uploaded_file($tmp_file, $target_file);
          echo "Imagen añadida";    
        
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        //MAKING A UPDATE
        $id_equipo=$_POST['id_equipo'];
        $club_seleccion=$_POST['club_seleccion'];
        $nombre=$_POST['nombre'];
        $pais=$_POST['pais'];
        $continente=$_POST['continente'];
            
        $query2="Update equipo SET 
        id_equipo='$id_equipo',
        club_seleccion='$club_seleccion',
        nombre='$nombre',
        pais='$pais',
        continente='$continente'";
            
        if ($_FILES['imagen_equipo']['name']!="") {
            $query2=$query2.",imagen_equipo='$target_file'";
        }
        
        $query2=$query2." WHERE id_equipo='$id_equipo'";
            
        $result = $connection->query($query2);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($query2);
        } else {
            echo "Equipo actualizado correctamente";
            header("Refresh:2; url=panel_admin.php");
        }
        }
        ?>

      <?php endif ?>

  </body>
</html>