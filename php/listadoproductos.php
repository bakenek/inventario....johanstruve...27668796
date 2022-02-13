<?php 
  include_once('../php/conexion.php'); 
  $link = Conectarse(); 
  session_start();
  if(!isset($_SESSION['gcIdUser'])) {
    header('Location: ../index.html');   
  }
  
  $lcIdUser   = $_SESSION["gcIdUser"]; 
  $lcalias    = $_SESSION["gcAlias"];  
  $lcNombre   = $_SESSION["gcNombre"]; 
 
  $sql = "SELECT * FROM productos";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) <= 0) {
    echo "No hay productos registrados , verifique";
    exit(); 
  }
  
	require('../pdf/fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	$y_axis_initial = 25;
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'',0,0,'C');
	$pdf->Cell(100,10,'Listado de Productos',1,0,'C');
	$pdf->Ln(20);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(50,10,'Producto',1,0,'C',1);
	$pdf->Cell(25,10,'Marca',1,0,'C',1);
	$pdf->Cell(20,10,'Existencia',1,0,'C',1);
	$pdf->Cell(20,10,'Precio',1,0,'C',1);
	$pdf->Ln(10);
	
	while ($reg = mysqli_fetch_assoc($result)){
		$nombre   = $reg['nombre'];
		$marca      = $reg['marca'];
		$exitencia  = $reg['existencia'];
		$precio     = $reg['precio'];

		$pdf->Cell(50,10,$nombre,1,0,'L',0);
		$pdf->Cell(25,10,$marca,1,0,'L',0);
		$pdf->Cell(20,10,$exitencia,1,0,'R',1);
		$pdf->Cell(20,10,$precio,1,0,'R',1);
		$pdf->Ln(10);
	}
	
	$pdf->Output();
  
?>

