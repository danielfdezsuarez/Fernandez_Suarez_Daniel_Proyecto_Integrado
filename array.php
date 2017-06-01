<?php
include 'conexion.php';
      
$query = "select pais, count(pais) as num from equipo group by pais";

$array = array();
if ($result = $connection->query($query)) {
  
  $array['cols'] = array();
  $array['cols'][] = array(
    'label' => 'pais',
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
        'v' => $obj->pais,
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