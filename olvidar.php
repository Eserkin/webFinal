<?php 
	session_start();
	if($_SESSION["log"]==1){
		session_destroy();
	}
	if(isset($_COOKIE['perfil'])){
		setcookie("perfil",1,time()-60*60*24*7);
	}
	header("Location:index.php");

 ?>