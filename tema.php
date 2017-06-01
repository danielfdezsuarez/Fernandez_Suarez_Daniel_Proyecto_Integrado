<?php
        /*$usuario=$_SESSION["user"];
        include 'conexion.php';
        
        $query="SELECT * FROM usuario WHERE user='$usuario'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $user=$obj->user;
            $tema=$obj->tema;
        }
        */
        
    
    function tema($usuario){
        $datos=[];
        include 'conexion.php';
        
        $query="SELECT user,tema FROM usuario WHERE user='$usuario'";
        if ($result = $connection->query($query)) {
            while($obj = $result->fetch_object()){
                $datos[]=$obj;
            }
            return $datos;
        }  
    } 
    
?>