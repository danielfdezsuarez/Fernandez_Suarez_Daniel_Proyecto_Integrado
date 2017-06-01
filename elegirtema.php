<?php
  session_start();
  if (isset($_SESSION["user"])) {
    
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>

<?php
    include 'conexion.php';
    if (isset($_POST["tema"])){
        $consulta="UPDATE usuario set tema='".$_POST["tema"]."'";
        $query=mysqli_query($conexion,$consulta);
        if (!$query) {
            echo "error elegir tema";
        }else{
            
        }
    }

?>