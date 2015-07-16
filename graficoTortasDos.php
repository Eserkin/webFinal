<?php
	
// agregamos la bibliotecas necesarias
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
//coneccion con base de datos


$conexion=mysqli_connect("localhost","root","","asd3");

if (mysqli_connect_errno()) {
  echo "Falló la conexión con MySQL: " . mysqli_connect_error();
}
$resultadoUno = mysqli_query($conexion,"select count(*) cantidad1 from disparo where factor=1");

while($row = mysqli_fetch_array($resultadoUno)) {
$dato1  = $row["cantidad1"];
 }
   
$resultadoDos = mysqli_query($conexion,"select count(*) cantidad2 from disparo where factor=0");

while($row = mysqli_fetch_array($resultadoDos)) {
$dato2  = $row["cantidad2"];
 }
mysqli_close($conexion);

$data=array($dato1,$dato2);
$a=array('reales','falsas');

$ancho = 600; $alto = 250;
 //crear la instancia del objeto graph
$graph = new PieGraph($ancho,$alto, 'auto'	);
$graph->img->SetAntiAliasing();
// $graph->SetMarginColor('gray');
$graph->title->Set("Alarmas disparadas reales/falsas");
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$p1 = new PiePlot3D($data);
$p1->SetLegends($a);
$p1->SetSize(0.45);
$p1->SetCenter(0.5);
$p1->SetLabelType(PIE_VALUE_ADJPERCENTAGE);
$graph->legend->SetAbsPos(220,220,50,10);
$graph->title->SetMargin(20,50,50,100);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("black");
$p1->SetLabelPos(0.5);
$graph->Add($p1);
$graph->Stroke(); 

?>


