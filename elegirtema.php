<?php
  session_start();
  if (isset($_SESSION["user"])) {
    
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>

<?php
    $conexion=mysqli_connect("localhost", "root", "123456", "camisetas");
    if (isset($_POST["tema"])){
        $consulta="UPDATE usuario set tema='".$_POST["tema"]."'";
        $query=mysqli_query($conexion,$consulta);
        if (!$query) {
            echo "error elegir tema";
        }else{
            
        }
    }

   /* if (isset($_SESSION["user"])){
        $user=$_SESSION["user"];
        $query="select tema from usuario where id_user=$user";
          if ($result = $connection->query($query)){
          while($obj = $result->fetch_object()){
               echo'<link rel="stylesheet" href="css/'.$obj->tema.'.css" type="text/css" media="screen" />';
               echo'<link href="css/'.$obj->tema.'.css" rel="stylesheet">';
         }
         }
        } else{
        echo'<link rel="stylesheet" href="css/Predeterminado.css" type="text/css" media="screen" />';
        echo'<link href="css/Predeterminado.css" rel="stylesheet">';
        }
        */
?>