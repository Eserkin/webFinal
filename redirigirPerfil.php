<?php 
	function redirigirPerfil($perfil){
		session_start();
		$_SESSION["log"]=1;
		$_SESSION["perfil"]=$perfil;
		if($perfil=="1"){
			header("Location:userIndex.php");				
			}elseif($perfil=="2"){
				header("Location:monitoreador.php");
			}else{
				header("Location:admin.php");
			}
	}
 ?>
