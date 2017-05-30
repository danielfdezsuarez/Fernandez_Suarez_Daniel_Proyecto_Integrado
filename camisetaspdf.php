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
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,"Jugador",1,0,'C');
    $pdf->Cell(12,5,"Dorsal",1,0,'C');
    $pdf->Cell(20,5,"Marca",1,0,'C');
    $pdf->Cell(20,5,"Publicidad",1,0,'C');
    $pdf->Cell(22,5,"Temporada",1,0,'C');
    $pdf->Cell(50,5,"Competicion",1,0,'C');
    $pdf->Cell(42,5,"Observaciones",1,0,'C');
    $pdf->ln();

    if ($result = $connection->query("select * from camiseta;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(30,5,$obj->jugador,1,0,'C');
            $pdf->Cell(12,5,$obj->dorsal,1,0,'C');
            $pdf->Cell(20,5,$obj->marca,1,0,'C');
            $pdf->Cell(20,5,$obj->publicidad,1,0,'C');
            $pdf->Cell(22,5,$obj->temporada,1,0,'C');
            $pdf->Cell(50,5,$obj->competicion,1,0,'C');
            $pdf->Cell(42,5,$obj->observaciones,1,0,'C');
            $pdf->ln();
            }  
            }


    $pdf->Output();

?>