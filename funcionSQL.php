<?php
	function abriendoConexionSQL($host='localhost',$usuario='root',$bd='asd3',$pass=''){
		$conexion=mysql_connect($host,$usuario,$pass);
		if(!mysql_select_db($bd)) return false;
		return $conexion;
	}
	function desconectarSQL($link){
		mysql_close($link);
	}
	function consultaDatos($query){
		mysql_set_charset('utf8');//solucion para los acentos
		return mysql_query($query);
	}
 ?>
