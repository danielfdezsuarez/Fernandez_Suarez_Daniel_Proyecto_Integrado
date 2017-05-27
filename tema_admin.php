<!-- con consulta bd
-->



<?php
  session_start();
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>


  
      <?php if (!isset($_POST["id_user"])) : ?>

        <?php
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT tema FROM usuario WHERE id_user='$cod'";
        if ($result = $connection->query($query)) {
            
            while($obj = $result->fetch_object()){
                
            /*$obj = $result->fetch_object();
            $tema=$obj->tema;*/
            echo'<link rel="stylesheet" href="/css/'.$obj->tema.'.css" type="text/css" media="screen" />';
            echo'<link href="../css/'.$obj->tema.'.css" rel="stylesheet">';
                
                }
        }
        ?>
