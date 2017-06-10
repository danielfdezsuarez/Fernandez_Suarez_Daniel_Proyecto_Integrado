<?php
    session_start();
    $x="conexion.php";
    if(file_exists($x)){
        require_once("$x");
      }else{
        header("Location:instalador.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <?php 
        if (isset($_SESSION["user"])) {
            echo 'Estás registrado como: '.$_SESSION['user'];
            include("tema.php");
        $datos=tema($_SESSION['user']);
        foreach ($datos as $dato) {
    ?>
        <link rel="stylesheet" type="text/css" href="css/<?php echo $dato->tema;?>.css">
    <?php 
        }
        } else {
    ?>
        <link rel="stylesheet" type="text/css" href="css/predeterminado.css">
    <?php
    }
    ?>
    <style>
      <?php include 'css/logo.css'; ?>
      <?php include 'css/index.css'; ?>
    </style>
  </head>   
  
  <body>
      <header>
        <a href="panel_admin.php"><button>PANEL ADMIN</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      
      <?php include 'logo.php'; ?>
      
      
    <?php
      include 'conexion.php';
     
    ?>
      
    <?php if (!isset($_POST["cod_equipo"])) : ?>
      
        <form action="index.php" method="post" enctype="multipart/form-data">
          <br><fieldset>
            <span id="cosa">ELEGIR CLUB</span>
              <select name="cod_equipo" required><br>
                    <?php
                     include 'conexion.php';
                     $result = $connection->query("SELECT * FROM equipo where club_seleccion='club' order by nombre");
                     if ($result) {
                       while ($obj=$result->fetch_object()) {
                          $valor = $obj->id_equipo;
                          echo "<option  value='$valor'>";                              
                          echo $obj->nombre;
                          echo "</option>";
                        }
                     } else {
                       printf("Query failed: %s\n", $connection->connect_error);
                       exit();
                     }
                    ?>
              </select>
            <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
            
        <form action="index.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <span>ELEGIR SELECCIÓN</span>
              <select name="cod_equipo" required><br>
                    <?php
                     include 'conexion.php';
                     $result = $connection->query("SELECT * FROM equipo where club_seleccion='seleccion' order by nombre");
                     if ($result) {
                       while ($obj=$result->fetch_object()) {
                          $valor = $obj->id_equipo;
                          echo "<option  value='$valor'>";                              
                          echo $obj->nombre;
                          echo "</option>";
                       }
                     } else {
                       printf("Query failed: %s\n", $connection->connect_error);
                       exit();
                     }
                    ?>
              </select>
            <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
        
    
        
        <div id="novedades">
        <?php
            echo "ULTIMAS CAMISETAS AÑADIDAS";
            include 'conexion.php';

            if ($result = $connection->query("select * from camiseta order by id_camiseta desc limit 5;")) {
        ?>

            <form action="index.php" enctype="multipart/form-data">
              <table style="border:0px">
                  <?php
                    while($obj = $result->fetch_object()) {
                          $ruta2 = $obj->imagen;
                          echo "<td>
                            <form method='get'>
                            <a href='resultado.php?id=$obj->id_camiseta'>
                            <img src='$ruta2';/>
                            </a>
                            </form></td>";
                    }
            }
                  ?>
            </form>
        </div>

        <?php else: ?>
            <br>
            <table style="border:1px solid black">
                <thead>
                    <tr>
                      <th>Jugador</th>
                      <th>Dorsal</th>
                      <th>Marca</th>
                      <th>Publicidad</th>
                      <th>Temporada</th>
                      <th>Competición</th>
                      <th>Imagen</th>
                      <th>Observaciones</th>
                      <th>Ir</th>
                </thead>    
            
        <?php
        
        $cod=$_POST['cod_equipo'];
        include 'conexion.php';
        
        $query="select * from camiseta join camiseta_equipo on camiseta.id_camiseta=camiseta_equipo.id_camiseta join equipo on camiseta_equipo.id_equipo=equipo.id_equipo WHERE equipo.id_equipo='$cod'";
        if ($result = $connection->query($query)) {
            //echo var_dump($query);
            //printf("<p>The select query returned %d rows.</p>", $result->num_rows);
            
            while($obj = $result->fetch_object()) {
              echo "<tr>";
              //echo "<td>".$obj->id_camiseta."</a></td>";
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
              $ruta2 = $obj->imagen;
              echo "<td><img src='$ruta2'></td>";
              echo "<td>".$obj->observaciones."</td>";
              echo "<td>
                        <form method='get'>
                          <a href='resultado.php?id=$obj->id_camiseta'>
                            <img src='ir.ico';/>
                          </a>
                        </form></td>";
             echo "</tr>";
                
          }
            
          $result->close();
          unset($obj);
          unset($connection);  
            
        }
        ?>
    
            
    <?php endif ?>
            
  </body>
</html>