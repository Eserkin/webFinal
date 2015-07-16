<?php 
	session_start();
	if($_SESSION["perfil"]=="1"){
		$evento="B";
		$tipo="A";
	}else{
		$evento="C";
		$tipo="B";
	}
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		include_once ("funcionSQL.php");
		abriendoConexionSQL();
		$consulta=consultaDatos("SELECT estado FROM sistema WHERE cliente_id=$id;");
		$estado=mysql_result($consulta, '0');
		if($estado == '1'){
			$sistema=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
			$sistemaId=mysql_result($sistema, '0');
			$consultaid=consultaDatos("SELECT id FROM disparo WHERE sistema_id='$sistemaId' AND id=(SELECT MAX(id) FROM disparo WHERE sistema_id='$sistemaId');");
			$idUltimo=mysql_result($consultaid, '0');
			$handler = curl_init("http://181.171.231.235/alarmas/disparo.php?accion=C&usuario=grupo11&password=e57a8a52b627f5939eadae00feb1f1a7&sistema=$sistemaId&cliente=$id&tipo=$tipo&activador=$idUltimo");  
			curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($handler);
			if(strpos($response, "ok")!==FALSE){
				consultaDatos("UPDATE sistema SET estado='0' WHERE cliente_id=$id;");
			}
			$fecha=date("Y-m-d H:i:s");
			consultaDatos("UPDATE disparo SET fecha_finalizacion='$fecha' WHERE id='$idUltimo';");
			//modificar alarma anterior y poner la fecha ede finalizacion	
		}else{
			consultaDatos("UPDATE sistema SET estado='1' WHERE cliente_id=$id;");
			$fecha=date("Y-m-d H:i:s");
			$sistema=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
			$sistemaId=mysql_result($sistema, '0');
			$consultaEvento=consultaDatos("SELECT id FROM evento WHERE abreviatura='$evento';");
			$eventoId=mysql_result($consultaEvento, '0');
			$handler = curl_init("http://181.171.231.235/alarmas/disparo.php?accion=D&usuario=grupo11&password=e57a8a52b627f5939eadae00feb1f1a7&sistema=$sistemaId&cliente=$id&tipo=$tipo&activador=$idUltimo");  
			curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($handler);
			if(strpos($response, "ok")!==FALSE){
				consultaDatos("UPDATE sistema SET estado='1' WHERE cliente_id=$id;");
			}
			consultaDatos("INSERT INTO disparo(fecha_inicio,factor,sistema_id,evento_id) VALUES ('$fecha','1','$sistemaId','$eventoId'); ");
		}
		header("Location:userIndex.php");
	}
 ?>