<?php 
	function abriendoConexionSQL($host,$usuario,$bd,$pass){
		$conexion=mysql_connect($host,$usuario,$pass);
		if(!mysql_select_db($bd)) return false;
		return $conexion;
	} 
	function desconectarSQL($link){
		mysql_close($link);
	}
	function consultaDatos($query){
		return mysql_query($query);
	}
 ?>
