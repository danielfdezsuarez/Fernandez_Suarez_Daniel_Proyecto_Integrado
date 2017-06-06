<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTALADOR</title>
    <link rel="stylesheet" type="text/css" href="css/predeterminado.css">
    <style>
      <?php include 'css/logo.css'; ?>
      <?php include 'css/index.css'; ?>
    </style>
  </head>   
  
  <body>
      <header>
        <a href="index.php"><button>INDEX</button></a>
      </header>
      
      <?php include 'logo.php'; ?>
      
      <?php
        if(!isset($_POST['ip'])){
      ?>
      
        <form action="" method="post">
           <!-- BD -->
           <fieldset>
               
               <p>Dirección IP</p>
               <input type="text" class="form-control" name="ip" id="ip" required>
           </fieldset>
           
           <fieldset>
                <p>Usuario BD</p>
                <input type="text" class="form-control" name="userbd" id="userbd" required>
           </fieldset>
            
           <fieldset>
                <p>Contraseña BD</p>
                <input type="password" class="form-control" name="passwordbd" id="passwordbd" required>
           </fieldset>
            
           <fieldset>
                <p>Nombre BD</p>
                <input type="text" class="form-control" name="nombrebd" id="nombrebd" required>
           </fieldset>
           <!-- Admin -->
           <fieldset>
               <input type="hidden" name="id_user"/>
               <p>Nombre admin</p>
               <input type="text" class="form-control" name="user" id="user" required>
           </fieldset>
        
           <fieldset>
               <p>Contraseña admin</p>
               <input type="password" class="form-control" name="password" id="password" required>
           </fieldset>
           
           <fieldset>
                <p>Detos ejemplo</p>
                <input type="radio" name="datos" value="si" class="radio" required/>Si
                <input type="radio" name="datos" value="no" class="radio" required/>No
            </fieldset>
                
           <button type="submit">Enviar</button>
        
        </form>
      
    
<?php
        }else{
            $ip=$_POST["ip"];
            $userbd=$_POST["userbd"];
            $passwordbd=$_POST["passwordbd"];
            $nombrebd=$_POST["nombrebd"];
            $user=$_POST["user"];
            $connection = new mysqli("$ip","$nombrebd","$passwordbd");
        
            $a = '<?php $connection = new mysqli("'.$ip.'", "'.$userbd.'", "'.$passwordbd.'", "'.$nombrebd.'"); ?>';
      
            $file=fopen("conexionbd.php","w");
            fwrite($file,$a);
            fclose($file);
            $connection = new mysqli("'.$ip.'", "'.$userbd.'", "'.$passwordbd.'", "'.$nombrebd.'");
           // $consulta= "create database $nombrebd;";
            $result = $connection->query($consulta);
               if (!$result) {
                    echo "Query Error";
                    var_dump($consulta);
                }
            
            $tablas=file_get_contents('camisetas.sql');
            $tablas=explode(";", $tablas);
            foreach ($tablas as $tabla) {
                $insertar=$tabla;
                if ($insertar!="") {
                    $query=mysqli_query($insertar,$conexion);
                }
            }
            
        }
      
      
      
      ?>

        <?php
     
      /*  
      $ip=$_POST["ip"];
        $userbd=$_POST["userbd"];
        $passwordbd=$_POST["passwordbd"];
        $nombrebd=$_POST["nombrebd"];
      
        $a = '<?php $connection = new mysqli("'.$ip.'", "'.$userbd.'", "'.$passwordbd.'", "'.$user.'");';
      
        $file=fopen("conexion.php","w");
        fwrite($file,$a);
        fclose($file);
        $connection = new mysqli("$ip","$nombrebd","$passwordbd");
        $consulta= "create database $nombrebd;";
        $result = $connection->query($consulta);
           if (!$result) {
                echo "Query Error";
                var_dump($consulta);
            }
        ?>
        
        <?php

        $consulta2="CREATE TABLE `alerta` (
          `id_alerta` int(4) NOT NULL,
          `id_equipo` int(11) NOT NULL,
          `mail` varchar(100) NOT NULL)";
echo $consulta2;
        $result = $connection->query($consulta2);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta2);
        };

        $consulta3="CREATE TABLE `camiseta` (
          `id_camiseta` int(5) NOT NULL,
          `jugador` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
          `dorsal` int(3) DEFAULT NULL,
          `marca` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
          `publicidad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
          `temporada` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
          `competicion` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
          `imagen` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
          `observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
        )";

        $result = $connection->query($consulta3);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta3);
        };

        $consulta4="CREATE TABLE `camiseta_equipo` (
          `id_camiseta` int(5) NOT NULL DEFAULT '0',
          `id_equipo` int(5) NOT NULL DEFAULT '0'
        )";

        $result = $connection->query($consulta4);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta4);
        };

        $consulta5="CREATE TABLE `equipo` (
          `id_equipo` int(5) NOT NULL,
          `club_seleccion` varchar(50) DEFAULT NULL,
          `nombre` varchar(500) DEFAULT NULL,
          `pais` varchar(200) DEFAULT NULL,
          `continente` varchar(200) DEFAULT NULL,
          `imagen_equipo` varchar(500) DEFAULT NULL
        )";

        $result = $connection->query($consulta5);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta5);
        };

        $consulta6="CREATE TABLE `usuario` (
          `id_user` int(3) NOT NULL,
          `user` varchar(45) NOT NULL,
          `password` varchar(64) NOT NULL,
          `mail` varchar(200) DEFAULT NULL
        )";

        $result = $connection->query($consulta6);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta6);
        };

        $consulta7="ALTER TABLE `alerta`
          ADD PRIMARY KEY (`id_alerta`),
          ADD KEY `id_equipo` (`id_equipo`);";

        $result = $connection->query($consulta7);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta7);
        };

        $consulta8="ALTER TABLE `camiseta`
          ADD PRIMARY KEY (`id_camiseta`);";

        $result = $connection->query($consulta8);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta8);
        };

        $consulta8="ALTER TABLE `camiseta_equipo`
          ADD PRIMARY KEY (`id_camiseta`,`id_equipo`),
          ADD KEY `id_equipo` (`id_equipo`);";

        $result = $connection->query($consulta8);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta8);
        };

        $consulta10="ALTER TABLE `equipo`
          ADD PRIMARY KEY (`id_equipo`);";

        $result = $connection->query($consulta10);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta10);
        };

        $consulta11="ALTER TABLE `usuario`
          ADD PRIMARY KEY (`id_user`);";

        $result = $connection->query($consulta11);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta11);
        };

        $consulta12="ALTER TABLE `alerta`
          MODIFY `id_alerta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;";

        $result = $connection->query($consulta12);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta12);
        };

        $consulta13="ALTER TABLE `camiseta`
          MODIFY `id_camiseta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;";

        $result = $connection->query($consulta13);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta13);
        };

        $consulta14="ALTER TABLE `equipo`
          MODIFY `id_equipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;";

        $result = $connection->query($consulta14);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta14);
        };

        $consulta15="ALTER TABLE `usuario`
          MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;";

        $result = $connection->query($consulta15);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta15);
        };

        $consulta16="ALTER TABLE `alerta`
          ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);";

        $result = $connection->query($consulta16);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta16);
        };

        $consulta17="ALTER TABLE `camiseta_equipo`
          ADD CONSTRAINT `camiseta_equipo_ibfk_1` FOREIGN KEY (`id_camiseta`) REFERENCES `camiseta` (`id_camiseta`),
          ADD CONSTRAINT `camiseta_equipo_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);";

        $result = $connection->query($consulta17);
          if (!$result) {
             echo "Query Error";
           var_dump($consulta17);
        };
*/
        ?>
      
        <?php
      /*
            $id_user=$_POST["id_user"];
            $user=$_POST["user"];
            $password=$_POST["password"];
            $cons="SELECT * FROM usuario WHERE nombre_usuario = '$user' AND password = md5('$password')";
            $result = $connection->query($cons);
            
            if ($result->num_rows==0) {
            $consulta20= "INSERT INTO usuario (id_user,user,password,mail,tema) VALUES ($id_user,'$user',md5('$password'),'','')";
            $result = $connection->query($consulta20);
            
            $cons= "UPDATE `usuarios` SET `idUsuario` = 0
               WHERE `usuarios`.`nombre_usuario` = '$userName'";
            $result = $connection->query($cons);
               if (!$result) {
               echo "error";
            } else {
              echo "Registro completado";
              
            }
            } else {
              echo "Ya estás registrado";
              
            }*/
        ?>
      
        <?php
            
           /* if ($datos=='si') {
               
                $consulta21="INSERT INTO `alerta` (`id_alerta`, `id_equipo`, `mail`) VALUES
                    (4, 4, 'mailfalso123');";
                
                $result = $connection->query($consulta21);
                  if (!$result) {
                     echo "Query Error";
                   var_dump($consulta21);
                };
                
                $consulta22="INSERT INTO `camiseta` (`id_camiseta`, `jugador`, `dorsal`, `marca`, `publicidad`, `temporada`, `competicion`, `imagen`, `observaciones`) VALUES
                    (1, '', NULL, 'joma', '', '2001-02', 'liga_española', 'img/sevilla_1.jpg', 'blanca');";
                
                $result = $connection->query($consulta22);
                  if (!$result) {
                     echo "Query Error";
                   var_dump($consulta22);      
                };
                      
                $consulta23="INSERT INTO `camiseta_equipo` (`id_camiseta`, `id_equipo`) VALUES (1, 1);";
                
                $result = $connection->query($consulta23);
                  if (!$result) {
                     echo "Query Error";
                   var_dump($consulta23); 
                };
                      
                $consulta24="INSERT INTO `equipo` (`id_equipo`, `club_seleccion`, `nombre`, `pais`, `continente`, `imagen_equipo`) VALUES
                    (1, 'club', 'sevilla_fc', 'españa', 'europa', 'img/escudo_sevilla1.png');";
                
                $result = $connection->query($consulta24);
                  if (!$result) {
                     echo "Query Error";
                   var_dump($consulta24);      
                };
                      
                $consulta25="INSERT INTO `usuario` (`id_user`, `user`, `password`, `mail`) VALUES
                    (1, 'dani', 'e10adc3949ba59abbe56e057f20f883e', 'dani@dani.com');";
                
                $result = $connection->query($consulta25);
                  if (!$result) {
                     echo "Query Error";
                   var_dump($consulta25);       
                };
                      
                
            } else {
                echo "Instalación completada";
            }*/
            
        ?>
      
      
  
      
  </body>
</html>