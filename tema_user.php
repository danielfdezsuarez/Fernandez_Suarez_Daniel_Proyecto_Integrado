<!-- sin conexion bd
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" type="text/css" href="css/index1.css">
    <style>
      <?php include 'css/logo.css'; ?>
    </style>
  </head> 


<?php
      $connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }    
?>


<?php if (!isset($_POST["tema"])) : ?>
      
        <form action="tema_user.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="tema">
              Elegir tema:
              <input type="radio" name="tema" value="predeterminado"> Prederminado
              <input type="radio" name="tema" value="negro"> negro
              <input type="radio" name="tema" value="verde"> Verde
              <input type="submit" value="ok">
            </div>
	      </fieldset>
        </form><br>

<?php else: ?>

        <?php
        
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $tema=$_POST['tema'];
                            
        $consulta="Update usuario SET 
        tema='$tema' WHERE id_user='$id_user'";
            
        $result = $connection->query($consulta);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($consulta);
        } else {
            echo "Usuario actualizado correctamente";
            header("Refresh:2; url=usuarios.php");
        }
        
        ?>
        <!--'css/index1.css'
        'css/index2.css'

        echo'<link rel="stylesheet" href="css/'.$obj->tema.'.css" type="text/css" media="screen" />';
        echo'<link href="../css/'.$obj->tema.'.css" rel="stylesheet">';-->

<?php endif ?>
    
</html>