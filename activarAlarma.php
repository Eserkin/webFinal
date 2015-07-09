<?php 
	session_start();
	$id=$_SESSION["id"];
	include_once ("funcionSQL.php");
	abriendoConexionSQL();
	$consulta=consultaDatos("SELECT estado FROM sistema WHERE cliente_id=$id;");
	$estado=mysql_result($consulta, '0');
	if($estado == '1'){
		consultaDatos("UPDATE sistema SET estado='0' WHERE cliente_id=$id;");
		$sistema=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
		$sistemaId=mysql_result($sistema, '0');
		$consultaid=consultaDatos("SELECT id FROM disparo WHERE sistema_id='$sistemaId' AND id=(SELECT MAX(id) FROM disparo WHERE sistema_id='$sistemaId');");
		$idUltimo=mysql_result($consultaid, '0');
		$fecha=date("Y-m-d H:i:s");
		consultaDatos("UPDATE disparo SET fecha_finalizacion='$fecha' WHERE id='$idUltimo';");
		//modificar alarma anterior y poner la fecha ede finalizacion	
	}else{
		consultaDatos("UPDATE sistema SET estado='1' WHERE cliente_id=$id;");
		$fecha=date("Y-m-d H:i:s");
		$sistema=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
		$sistemaId=mysql_result($sistema, '0');
		$evento=consultaDatos("SELECT id FROM evento WHERE nombre='prueba';");
		$eventoId=mysql_result($evento, '0');
		consultaDatos("INSERT INTO disparo(fecha_inicio,factor,sistema_id,evento_id) VALUES ('$fecha','1','$sistemaId','$eventoId'); ");
		//insertar alarma en la base de datos
	}
	header("Location:userIndex.php");
 ?>