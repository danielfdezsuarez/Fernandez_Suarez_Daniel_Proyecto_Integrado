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
    $pdf->Cell(20,5,"User",1,0,'C');
    $pdf->Cell(35,5,"Mail",1,0,'C');
    $pdf->ln();

    if ($result = $connection->query("select * from usuario;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(20,5,$obj->user,1,0,'C');
            $pdf->Cell(35,5,$obj->mail,1,0,'C');
            $pdf->ln();
            }  
            }


    $pdf->Output();

?>