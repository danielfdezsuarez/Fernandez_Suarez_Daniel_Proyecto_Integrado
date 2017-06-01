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

    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    //var_dump(get_class_methods($pdf));
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(20,5,"Club/Sel.",1,0,'C');
    $pdf->Cell(32,5,"Nombre",1,0,'C');
    $pdf->Cell(20,5,"Pais",1,0,'C');
    $pdf->Cell(30,5,"Continente",1,0,'C');
    $pdf->ln();

    if ($result = $connection->query("select * from equipo;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(20,5,$obj->club_seleccion,1,0,'C');
            $pdf->Cell(32,5,$obj->nombre,1,0,'C');
            $pdf->Cell(20,5,$obj->pais,1,0,'C');
            $pdf->Cell(30,5,$obj->continente,1,0,'C');
            $pdf->ln();
            }  
            }


    $pdf->Output();

?>