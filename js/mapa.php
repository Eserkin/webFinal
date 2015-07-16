<?php 
include_once("funcionSQL.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


//Se abre conexion a la base de datos y se selecciona la BD
$link=abriendoConexionSQL();

//Se selecciona todas la filas de la tabla sistema
$consulta=consultaDatos("SELECT U.perfil_id, U.nombre, C.telefono, S.direccion, Cam.url, cam.permitir_monitoreo, S.estado, S.latitud, S.longitud FROM sistema S JOIN cliente C ON S.cliente_id=C.id JOIN usuario U ON C.id=U.id JOIN camaras Cam ON S.id=Cam.sistema_id WHERE U.perfil_id=1");

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterar sobre las filas agregando nodos XML
while ($registro = mysql_fetch_array($consulta)){

  	  echo '<marker ';
	  echo 'nombre="' . parseToXML($registro['nombre']) . '" ';
	  echo 'direccion="' . parseToXML($registro['direccion']) . '" ';
	  echo 'telefono="' . $registro['telefono'] . '" ';
	  echo 'url="' . $registro['url'] . '" ';
	  echo 'estado="' . $registro['estado'] . '" ';
	  if($registro['permitir_monitoreo'] ==1){
	  	echo 'permitir_monitoreo="enabled" ';
	  }else{
	  	echo 'permitir_monitoreo="disabled" ';
	  }
	  echo 'latitud="' . $registro['latitud'] . '" ';
	  echo 'longitud="' . $registro['longitud'] . '" ';
	  echo '/>';

}


// End XML file
echo '</markers>';


desconectarSQL($link);
 ?>
