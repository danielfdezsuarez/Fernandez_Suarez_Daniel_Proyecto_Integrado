<?php
$connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
$query = "select continente, count(continente) as num from equipo group by continente";

$array = array();
if ($result = $connection->query($query)) {
  
  $array['cols'] = array();
  $array['cols'][] = array(
    'label' => 'continente',
    'type' => 'string'
  );
  $array['cols'][] = array(
    'label' => 'Contador',
    'type' => 'string'
  );
  
  $array['rows'] = array();
  while($obj = $result->fetch_object()) {
    $array['rows'][]['c'] = array(
      array(
        'v' => $obj->continente,
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
  die(json_encode($array,JSON_NUMERIC_CHECK));
}
?>