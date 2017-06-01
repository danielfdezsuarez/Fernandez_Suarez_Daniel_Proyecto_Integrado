<?php
        $usuario=$_SESSION["user"];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM usuario WHERE user='$usuario'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $user=$obj->user;
            $tema=$obj->tema;
        }

    /*
    function tema($usuario){
        $datos=[];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT user,tema FROM usuario WHERE user='$usuario'";
        if ($result = $connection->query($query)) {
            while($obj = $result->fetch_object()){
                $datos[]=$obj;
            }
            return $datos;
        }  
    } 
    */
?>