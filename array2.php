<?php
include 'conexion.php';
      
$query = "select club_seleccion, count(club_seleccion) as num from equipo group by club_seleccion";

$array = array();
if ($result = $connection->query($query)) {
  
  $array['cols'] = array();
  $array['cols'][] = array(
    'label' => 'club_seleccion',
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
        'v' => $obj->club_seleccion,
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