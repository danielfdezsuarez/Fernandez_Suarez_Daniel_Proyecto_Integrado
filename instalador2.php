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
      

      <?php if (!isset($_POST['ip'])): ?>
      	
      
      
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
      
    
		<?php else: ?>
		
      
        <?php
            //var_dump($_POST);
            $ip=$_POST["ip"];
            $userbd=$_POST["userbd"];
            $passwordbd=$_POST["passwordbd"];
            $nombrebd=$_POST["nombrebd"];
            $user=$_POST["user"];
            $password=$_POST["password"];
            $datos=$_POST["datos"];
      
            /*include 'conexion.php';*/
            $connection = new mysqli("$ip","$userbd","$passwordbd");
            
            $query2="create database $nombrebd";
              if ($result = $connection->query($query2)) {
                  echo "bd creada";
              } else {
              echo "Fallo create database";
              exit();
              }
          
            $conex = '<?php $connection = new mysqli("'.$ip.'", "'.$userbd.'", "'.$passwordbd.'", "'.$nombrebd.'");
                $connection->set_charset("utf8");
      
                  if ($connection->connect_errno) {
                      printf("Connection failed: %s\n", $connection->connect_error);
                      exit();
                  }
                ?>
            ';
            $file=fopen("conexion.php","w");
            fwrite($file,$conex);
            fclose($file);
      
            $connection =  new mysqli("$ip","$userbd","$passwordbd","$nombrebd");
            if ($connection->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
            }

            if ($datos=='si') {
                $tablas=file_get_contents('camisetas.sql');
            } else {
                $tablas=file_get_contents('vacio.sql');
            }
            
            //$tablas=file_get_contents('camisetas.sql');
            $tablas=explode(";", $tablas);
            foreach ($tablas as $tabla) {
            $insertar=$tabla;
            if ($insertar!="") {
            $query = $connection->query($insertar);
            if ($query) {
                echo "Correcto";
            }else{
                
            }
            }
            }
      
            $query3="INSERT INTO usuario VALUES('', '$user', md5('$password'), '', 'predeterminado')";
            if ($result = $connection->query($query3)) {
                echo "Admin creado";
            } else {
            echo "Fallo insert admin";
            exit();
            }
      
            //unlink('instalador2.php');
            header("Refresh:2; url=index.php");
            ?>
      
      
      <?php endif ?>
      
      
  </body>
</html>