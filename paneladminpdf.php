<?php
  session_start();
  if (isset($_SESSION["user"])) {
    
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>

<?php
    
    $connection = new mysqli("localhost", "root", "123456", "camisetas");
    if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    //var_dump(get_class_methods($pdf));
    $pdf->AddPage();
    $pdf->SetFont('Times','',10);
    $pdf->Cell(20,5,"Club/Sel.",1,0,'C');
    $pdf->Cell(32,5,"Nombre",1,0,'C');
    $pdf->Cell(20,5,"Pais",1,0,'C');
    $pdf->Cell(30,5,"Continente",1,0,'C');
    $pdf->Cell(25,5,"Jugador",1,0,'C');
    $pdf->Cell(12,5,"Dorsal",1,0,'C');
    $pdf->Cell(15,5,"Marca",1,0,'C');
    $pdf->Cell(23,5,"Publicidad",1,0,'C');
    $pdf->Cell(21,5,"Temporada",1,0,'C');
    $pdf->ln();

    if ($result = $connection->query("select * from camiseta join camiseta_equipo on camiseta.id_camiseta=camiseta_equipo.id_camiseta 
      join equipo on camiseta_equipo.id_equipo=equipo.id_equipo order by camiseta.id_camiseta;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(20,5,$obj->club_seleccion,1,0,'C');
            $pdf->Cell(32,5,$obj->nombre,1,0,'C');
            $pdf->Cell(20,5,$obj->pais,1,0,'C');
            $pdf->Cell(30,5,$obj->continente,1,0,'C');
            $pdf->Cell(25,5,$obj->jugador,1,0,'C');
            $pdf->Cell(12,5,$obj->dorsal,1,0,'C');
            $pdf->Cell(15,5,$obj->marca,1,0,'C');
            $pdf->Cell(23,5,$obj->publicidad,1,0,'C');
            $pdf->Cell(21,5,$obj->temporada,1,0,'C');
            $pdf->ln();
            }  
            }


    $pdf->Output();

?>