<?php
	
// agregamos la bibliotecas necesarias
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');

$con=mysqli_connect("localhost","root","","asd3");
if (mysqli_connect_errno()) {
  echo "Falló la conexión a MySQL: " . mysqli_connect_error();
}
$resultado = mysqli_query($con,"SELECT localidad.nombre localidad, count(*) cantidad_de_usuarios FROM localidad join sistema on sistema.localidad_id = localidad.id join usuario on usuario.id= sistema.cliente_id where usuario.estado=1 group by localidad.id, localidad.nombre");
 
while($row = mysqli_fetch_array($resultado)) {
$loc[] =  $row["localidad"];
$dato[]  = $row["cantidad_de_usuarios"];
}
mysqli_close($con);

$ancho = 600; $alto = 400;
$graph = new PieGraph($ancho,$alto, 'auto'	);
$graph->img->SetAntiAliasing();
$graph->title->Set("Porcentaje de clientes por localidad");
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$p1 = new PiePlot3D($dato);
$p1->SetLegends($loc);
$p1->SetSize(0.45);
$p1->SetCenter(0.5);
$p1->SetLabelType(PIE_VALUE_ADJPERCENTAGE);
$graph->legend->SetAbsPos(150,350,50,10);
$graph->title->SetMargin(20,50,50,100);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("black");
$p1->SetLabelPos(0.5);
 
$graph->Add($p1);
//$graph->Stroke('mygraph.png');

//echo "<img src='mygraph.png' alt='my graph' />";
//echo "Anything I want to go with the graph";
$graph->Stroke(); 
$graph->Stroke(_IMG_HANDLER);

$imagen2 = "../grafico2.png";
$graph->img->Stream($imagen2);

//$path = dirname(__FILE__) . '/'; 
//$pathimg = $path . 'img/'; 
// Display the graph 
//$graph->Stroke($pathimg . 'grafico.png'); 


  ?>