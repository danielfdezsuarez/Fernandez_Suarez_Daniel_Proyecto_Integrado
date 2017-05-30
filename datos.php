<?php
$connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
      
// Consulta que genera los valores de la grafica
$query = "select marca, count(marca) as num from camiseta group by marca";
  /*$query="select tipo as valor, count(idUsuario) as num
  from usuarios group by tipo"; */       
// Inicializamos el array
$array = array();
if ($result = $connection->query($query)) {
  // Construimos primero las columnas, estaticas
  $array['cols'] = array();
  $array['cols'][] = array(
    'id' => '',
    'label' => 'prueba',
    'pattern' => '',
    'type' => 'string'
  );
  $array['cols'][] = array(
    'id' => '',
    'label' => 'prueba2',
    'pattern' => '',
    'type' => 'string'
  );
  // Ahora hacemos las columnas, dinamicas desde la base de datos
  $array['rows'] = array();
  while($obj = $result->fetch_object()) {
    $array['rows'][]['c'] = array(
      array(
        'v' => $obj->marca,
        'f' => null
      ),
      array(
        'v' => $obj->num,
        'f' => null
      )
    );
  };
  $result->close();
  unset($obj);
  unset($connection);
  // Devolvemos al ajax el json listo para pintar. JSON_NUMERIC_CHECK es necesario para que los strings numericos los deje como esté y no los converta a string con comillas.
  die(json_encode($array,JSON_NUMERIC_CHECK));
}
?>