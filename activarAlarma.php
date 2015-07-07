<?php 
	session_start();
	$id=$_SESSION["id"];
	include_once ("funcionSQL.php");
	abriendoConexionSQL();
	$consulta=consultaDatos("SELECT estado FROM sistema WHERE cliente_id=$id;");
	$estado=mysql_result($consulta, '0');
	if($estado == '1'){
		consultaDatos("UPDATE sistema SET estado='0' WHERE cliente_id=$id;");
		//modificar alarma anterior y poner la fecha ede finalizacion
	}else{
		consultaDatos("UPDATE sistema SET estado='1' WHERE cliente_id=$id;");
		//insertar alarma en la base de datos
	}
	header("Location:userIndex.php");
 ?>