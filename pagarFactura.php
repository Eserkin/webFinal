<?php
	session_start();
	$id=$_SESSION["id"];
	$nroFactura=$_GET["nroFactura"];
	include_once("funcionSQL.php");
	abriendoConexionSQL();
	if (consultaDatos("UPDATE factura SET estado='1' WHERE cliente_id=$id AND nro_factura=$nroFactura;")) {
		$consulta=consultaDatos("SELECT factura WHERE cliente_id=$id AND estado='0';");
		$pagadas=mysql_result($consulta, '0');
		if($pagadas == '0') consultaDatos("UPDATE usuario SET estado='1' WHERE id='$id';");
		header("Location:userFactura.php?pagado=1&nro_factura=$nroFactura");
		exit();
	}
	header("Location:userFactura.php?pagado=0&nro_factura=$nroFactura");
	exit();
 ?>