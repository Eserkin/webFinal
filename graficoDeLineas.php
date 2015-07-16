<?php
	
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
//require_once ('jpgraph/jpgraph_date.php');

//$dateUtils = new DateScaleUtils();
//conectamos con base de datos
$conexion=mysqli_connect("localhost","root","","asd3");
// Check connection
if (mysqli_connect_errno()) {
  echo "Falló la conexión con MySQL: " . mysqli_connect_error();
}

$resultadoUno = mysqli_query($conexion,"select count(*) cantidad_de_alarmas, DATE(fecha_inicio) fecha from disparo group by DATE(fecha_inicio);   ");

while($row = mysqli_fetch_array($resultadoUno)) {
$fechaUno[] =  $row["fecha"];
$datoUno[]  = $row["cantidad_de_alarmas"];
}
/*$resultadoDos = mysqli_query($conexion,"select count(*) cantidad_de_alarmas, DATE(fecha) fecha from disparo where factor=1 group by DATE(fecha) ");


while($row = mysqli_fetch_array($resultadoDos)) {
$fechaDos[] =  $row["fecha"];
$datoDos[]  = $row["cantidad_de_alarmas"];
 
}

$resultadoTres = mysqli_query($conexion,"select count(*) cantidad_de_alarmas, DATE(fecha) fecha from disparo where factor=0 group by DATE(fecha) ");


while($row = mysqli_fetch_array($resultadoTres)) {
$fechaTres[] =  $row["fecha"];
$datoTres[]  = $row["cantidad_de_alarmas"];
 
}*/

mysqli_close($conexion);

$ancho = 800; $alto = 250;
//crear la instancia del objeto graph
$graph = new Graph($ancho, $alto, 'auto');
$graph->SetScale("intint");
$graph->yaxis->scale->SetAutoMin(0);
$graph->img->SetMargin(80,50,70,50);
$graph->SetShadow();
$graph->xaxis->SetTickLabels($fechaUno);
$lplot = new LinePlot($datoUno);
$lplot->SetColor("#6495ED");
$lplot->SetWeight(4);
$graph->xgrid->Show(true);
$graph->ygrid->Show(true);
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$graph->title->set("Alarmas disparadas por fecha");
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->yaxis->title->set("cantidad de alarmas");
$graph->xaxis->title->set("fecha");

$graph->Add($lplot);
$graph->Stroke();

?>
