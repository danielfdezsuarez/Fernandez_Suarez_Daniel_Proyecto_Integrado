<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/resultado.css">
    <style>
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
          <?php if (!isset($_POST["id_camiseta"])) : ?>

            <?php 
            $cod=$_GET['id'];

            $connection = new mysqli("localhost", "root", "123456", "camisetas");
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            $query3="SELECT id_equipo from camiseta_equipo where id_camiseta='$cod'";
            if ($result = $connection->query($query3)) {
                $obj = $result->fetch_object();
                $id_equipo=$obj->id_equipo;

                echo "<a href='suscripcion.php?id=$obj->id_equipo'><button class='boton'>Suscribirse a las novedades de este equipo</button></a></header>";  
            }
          
            include 'logo.php';
          
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

            }

            $query2="SELECT id_equipo FROM camiseta_equipo WHERE id_camiseta='$cod'";
            if ($result = $connection->query($query2)) {
                $obj = $result->fetch_object();
                $id_equipo=$obj->id_equipo;
            }


            $jugadormayus=ucfirst($jugador);
            $marcamayus=ucfirst($marca);
            $publicidadmayus=ucfirst($publicidad);
            $competicionmayus=ucfirst($competicion);
            $observacionesmayus=ucfirst($observaciones);
      
          ?>
        
            <div id="imagen">  
                <img src='<?php echo $ruta; ?>'>
            </div>
            <div id="resultado">
                <input type="hidden" value="<?php echo $cod; ?>" name="id_camiseta"/>
                <span>Jugador:</span><?php echo $jugadormayus; ?><br>
                <span>Dorsal:</span><?php echo $dorsal; ?><br>
                <span>Marca:</span><?php echo $marcamayus; ?><br>
                <span>Publicidad:</span><?php echo $publicidadmayus; ?><br>
                <span>Temporada:</span><?php echo $temporada; ?><br>
                <span>Competición:</span><?php echo $competicionmayus; ?><br>
                <span>Observaciones:</span><?php echo $observacionesmayus; ?><br><br>
            </div>
            
          
      <?php else: ?>
    
      <?php endif ?>

  </body>
</html>