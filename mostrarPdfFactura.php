<?php
	
	
require('fpdf/fpdf.php');

header("Content-Type: text/html; charset=iso-8859-1 ");
 
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


$pdf->Image('fpdf/logo.png',30,17,-300);	
$pdf->SetFont('Arial','B',30);
$pdf->Cell(190,30,'Secure Land',1,1,'C');
$pdf->SetFont('Arial','B',16);

session_start();
$id=$_SESSION["id"];
$nroFactura=$_GET["nroFactura"];


$con=mysqli_connect("localhost","root","","asd3");

if (mysqli_connect_errno()) {
  echo "Falló la conexión con MySQL: " . mysqli_connect_error();
}		
$resultado=mysqli_query($con,"select usuario.id nroDeUsuario, usuario.nombre nombre, usuario.apellido apellido, usuario.dni dni, sistema.direccion direccion, localidad.nombre localidad, factura.nro_factura nroDeFactura, factura.monto monto, factura.fecha fecha from usuario join sistema on usuario.id=sistema.cliente_id join localidad on sistema.localidad_id=localidad.id join factura on factura.cliente_id=sistema.cliente_id where factura.cliente_id=$id AND factura.nro_factura=$nroFactura");

$fila=mysqli_fetch_array($resultado);
mysqli_close($con);




$texto1='Nro. Cliente: '.$fila['nroDeUsuario']."\nApellido y Nombre: ".$fila['apellido']." ".$fila['nombre']."\nDNI: ".$fila['dni']."\nDomicilio: ".$fila['direccion']."\nLocalidad: ".$fila['localidad'];
$pdf->SetXY(25, 80);
$pdf->MultiCell(150,10,$texto1,1,"L");
$pdf->Ln(10);

$texto2="Factura numero: ".$fila['nroDeFactura']." de fecha: ".$fila['fecha'];
$pdf->SetXY(25, 150);
$pdf->Cell(150,10,$texto2,1,0,"C");

$total=0;

$pdf->SetXY(25, 180);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,10,"Detalle de la factura",1,0,"C",true);
$pdf->Cell(50,10,"Importe",1,0,"C",true);

$pdf->SetXY(25, 190);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(100,10,"Abono mensual",1,0,"L",true);
$pdf->Cell(50,10,"$".$fila['monto'],1,0,"R",true);

if($fila['nroDeFactura']==1){
$pdf->SetXY(25, 200);
$pdf->Cell(100,10,"Costo de productos",1,0,"L",true);
$pdf->Cell(50,10,"$".'1000',1,0,"R",true);

$pdf->SetXY(25, 210);
$pdf->Cell(100,10,"Costo de instalacion",1,0,"L",true);
$pdf->Cell(50,10,"$".'250',1,0,"R",true);
$total+=($fila['monto']+1250);

$pdf->SetXY(75, 220);
$pdf->Cell(50,10,"Total",1,0,"L",true);
$pdf->Cell(50,10,"$".$total,1,0,"R",true);

}
else{
$pdf->SetXY(75, 200);
$pdf->Cell(50,10,"Total",1,0,"L",true);
$pdf->Cell(50,10,"$".$fila['monto'],1,0,"R",true);
}

$pdf->Output();

?>