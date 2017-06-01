<?php
include 'conexion.php';
      
$query = "select nombre, count(nombre) as num from equipo join camiseta_equipo on equipo.id_equipo=camiseta_equipo.id_equipo group by nombre";

$array = array();
if ($result = $connection->query($query)) {
  
  $array['cols'] = array();
  $array['cols'][] = array(
    'label' => 'nombre',
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
        'v' => $obj->nombre,
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