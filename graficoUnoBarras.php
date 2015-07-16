<?php
	
// agregamos la bibliotecas necesarias
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
//conectamos con base de datos

$con=mysqli_connect("localhost","root","","asd3");
// Check connection
if (mysqli_connect_errno()) {
  echo "Falló la conexión a MySQL: " . mysqli_connect_error();
}
$resultado = mysqli_query($con,"SELECT localidad.nombre localidad, count(*) cantidad_de_usuarios FROM localidad join sistema on sistema.localidad_id = localidad.id join usuario on usuario.id= sistema.cliente_id where usuario.estado=1 group by localidad.id, localidad.nombre");

while($row = mysqli_fetch_array($resultado)) {
$loc[] =  $row["localidad"];
$data[]  = $row["cantidad_de_usuarios"];
}

mysqli_close($con);

$ancho = 500; $alto = 350;
$graph = new Graph($ancho, $alto, 'auto');
$graph->SetScale("textint");
$graph->img->SetMargin(50,30,80,50);
$graph->SetShadow();
$graph->xaxis->SetTickLabels($loc);
$bplot = new BarPlot($data);
//$bplot->SetFillColor("lightgreen"); 
//$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_BOLD);
$bplot->value->SetAngle(45);
$bplot->value->SetColor("black","navy");
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$graph->title->set("Clientes que adquieren el servicio por localidad");
$graph->title->SetMargin(50,30,50,50);
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 11);
$graph->xgrid->Show();
$graph->ygrid->Show();
$graph->yaxis->title->set("cantidad de usuarios");
$graph->xaxis->title->set("localidades");

$graph->Add($bplot);
$graph->Stroke();
$graph->Stroke(_IMG_HANDLER);

$imagen2 = "../grafico1.png";
$graph->img->Stream($imagen2);


//$graph->Stroke(_IMG_HANDLER);

  // $imagen1 = "/tmp/imagen/".$value->name.".png";
              // $graph->img->Stream($imagen1);



//$imagen1 = "/tmp/imagen/grafica1.png";
//$graph->img->Stream($imagen1);

?>


