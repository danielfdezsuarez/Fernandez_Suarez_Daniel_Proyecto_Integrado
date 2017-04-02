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
    <title>EDITAR CAMISETA</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
        span {
            width: 100px;
            display: inline-block;
        }
        fieldset img{
            max-height: 900px;
            max-width: 900px;  
        }
        fieldset{
            width: 400px;  
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
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_camiseta"])) : ?>

        <?php 
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
           
        $query="SELECT * FROM camiseta WHERE id_camiseta='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $id_camiseta=$obj->id_camiseta;
            $jugador=$obj->jugador;
            $dorsal=$obj->dorsal;
            $marca=$obj->marca;
            $publicidad=$obj->publicidad;
            $temporada=$obj->temporada;
            $competicion=$obj->competicion;
            $observaciones=$obj->observaciones;
            $ruta=$obj->imagen;
            //echo var_dump($ruta);
            
        }
      
        $query2="SELECT id_equipo FROM camiseta_equipo WHERE id_camiseta='$cod'";
        if ($result = $connection->query($query2)) {
            $obj = $result->fetch_object();
            //$id_camiseta=$obj->id_camiseta;
            $id_equipo=$obj->id_equipo;
        }
      
        ?>
      
        <form action="editar_camiseta.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR CAMISETA</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_camiseta"/>
            <span>Jugador:</span><input type="text" name="jugador" value="<?php echo $jugador; ?>"><br>
            <span>Dorsal:</span><input type="number" name="dorsal" value="<?php echo $dorsal; ?>"><br>
            <span>Marca:</span><input type="text" name="marca" value="<?php echo $marca; ?>"><br>
            <span>Publicidad:</span><input type="text" name="publicidad" value="<?php echo $publicidad; ?>"><br>
            <span>Temporada:</span><input type="text" name="temporada" value="<?php echo $temporada; ?>"><br>
            <span>Competición:</span><input type="text" name="competicion" value="<?php echo $competicion; ?>"><br>
            <span>Observaciones:</span><input type="text" name="observaciones" value="<?php echo $observaciones; ?>"><br>
            <span>Imagen:</span><input type="file" name="imagen"><br><img src='<?php echo $ruta; ?>'><br><br>
                <fieldset>
                    <legend>EQUIPO</legend>
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
                        </select>
                </fieldset>
	        <br><span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>

      <?php else: ?>

        <?php
        $valid= true;
        //var_dump($_FILES);
            
        if ($_FILES['imagen']['name']!="") {
            $tmp_file = $_FILES['imagen']['tmp_name'];
            $target_dir = "img/";
            $target_file = strtolower($target_dir . basename($_FILES['imagen']['name']));

            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $valid = false;
            }
            //Check the size of the file. Up to 2Mb
            if ($_FILES['imagen']['size'] > (2048000)) {
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
        $id_camiseta=$_POST['id_camiseta'];
        $jugador=$_POST['jugador'];
        $dorsal=$_POST['dorsal'];
        $marca=$_POST['marca'];
        $publicidad=$_POST['publicidad'];
        $temporada=$_POST['temporada'];
        $competicion=$_POST['competicion'];
        $observaciones=$_POST['observaciones'];
        $id_equipo=$_POST['id_equipo'];
        
        $query3="Update camiseta SET 
        id_camiseta='$id_camiseta',
        jugador='$jugador'";
        
        if ($dorsal=="") {
            $query3=$query3.",dorsal=null";
          } else {
            $query3=$query3.", dorsal='$dorsal'";
          }
        
        $query3=$query3.",
        marca='$marca',
        publicidad='$publicidad',
        temporada='$temporada',
        competicion='$competicion'";
        
        if ($_FILES['imagen']['name']!="") {
            $query3=$query3.",imagen='$target_file'";
        }
            
        $query3=$query3.",observaciones='$observaciones'
        WHERE id_camiseta='$id_camiseta'";
            
        $result = $connection->query($query3);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($query3);
        } else {
            echo "Camiseta actualizada correctamente";
        }
            
        $query4="Update camiseta_equipo SET 
        id_equipo='$id_equipo'
        WHERE id_camiseta='$id_camiseta'";
            
        $result = $connection->query($query4);
        if (!$result) {
            echo "WRONG QUERY";
        } else {
            echo "camiseta_equipo actualizada correctamente";
            header("Refresh:2; url=panel_admin.php");
        }
        }
        ?>
            
      <?php endif ?>

  </body>
</html>