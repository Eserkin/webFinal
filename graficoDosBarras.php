<?php

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');

$conexion=mysqli_connect("localhost","root","","asd3");

if (mysqli_connect_errno()) {
  echo "Falló la conexión con MySQL: " . mysqli_connect_error();
}

$resultadoUno = mysqli_query($conexion,"select count(*) cantidad1 from disparo where factor=1  ");

while($row = mysqli_fetch_array($resultadoUno)) {
$dato1  = $row["cantidad1"];
}
   
$resultadoDos = mysqli_query($conexion,"select count(*) cantidad2 from disparo where factor=0  ");

while($row = mysqli_fetch_array($resultadoDos)) {
$dato2  = $row["cantidad2"];
 }
 
$resultadoTres = mysqli_query($conexion,"select count(*) cantidad3 from disparo  ");

while($row = mysqli_fetch_array($resultadoTres)) {
$dato3  = $row["cantidad3"];
 }  
mysqli_close($conexion);

$ancho = 600; $alto = 250;
$graph = new Graph($ancho, $alto, 'auto');
$graph->SetScale("textint");
$graph->img->SetMargin(80,50,50,30);
$graph->SetShadow();
$graph->title->SetMargin(50,30,50,50);
$a = array ('reales','falsas','totales');
$graph->xaxis->SetTickLabels($a);
$graph->xaxis->SetFont(FF_FONT2);
$datos = array ($dato1,$dato2,$dato3);
$bplot1 = new BarPlot($datos);
$bplot1->SetFillColor("#cc1111"); 
$bplot1->value->Show();
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$graph->title->set("Alarmas disparadas ");
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->yaxis->title->set("Alarmas disparadas");
$bplot1->Setwidth(0.5);

$graph->Add($bplot1);
$graph->Stroke();
  
?>


