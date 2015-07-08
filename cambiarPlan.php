<?php 
	session_start();
	if(isset($_GET["plan"])){
		$plan=$_GET["plan"];
		$id=$_SESSION["id"];
		include_once("funcionSQL.php");
		$link=abriendoConexionSQL();
		if(consultaDatos("UPDATE cliente SET plan='$plan' WHERE id='$id';")){
			header("Location:userPlan.php?cambio=1");
			exit();
		}else{
			header("Location:userPlan.php?cambio=0");
			exit();
		}
	}
 ?>