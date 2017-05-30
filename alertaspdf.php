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
    $pdf->Cell(20,5,"ID_Equipo",1,0,'C');
    $pdf->Cell(35,5,"Mail",1,0,'C');
    $pdf->ln();

    if ($result = $connection->query("select * from alerta;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(20,5,$obj->id_equipo,1,0,'C');
            $pdf->Cell(35,5,$obj->mail,1,0,'C');
            $pdf->ln();
            }  
            }


    $pdf->Output();

?>