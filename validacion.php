<?php

	$usuario=$_POST["login"];
	$password=$_POST["password"];
	$recordar=$_POST["recordar"];
	require_once("funcionSQL.php");
	$login=0;
	$link=abriendoConexionSQL("localhost","root","seguridadlandia3.1");//ojo! cambiar nombre DB y pass para que funcione
	if (!$link) header("Location:index.php");
	$consulta=consultaDatos("SELECT * FROM usuario;");
	while ($linea= mysql_fetch_array($consulta)){
		if ($usuario == $linea["nick"]){
			if($password == $linea["clave"]){
				$login=1;
				$perfilUsuario=$linea["perfil_id"];	
			}
		}
	}
	if($login == 1){
			session_start();
			$_SESSION["log"]=1;
			$_SESSION["perfil"]=$perfilUsuario;
			if ($recordar=="1") setcookie('perfil', $perfilUsuario, time() + 365 * 24 * 60 * 60);
			include_once("redirigirPerfil.php");
			redirigirPerfil($perfilUsuario);
	}else{
			header("Location:index.php?validacion=1");
	}
 ?>
