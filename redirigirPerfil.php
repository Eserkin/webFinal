<?php 
	function redirigirPerfil($perfil){
		session_start();
		$_SESSION["log"]=1;
		$_SESSION["perfil"]=$perfil;
		if($perfil=="1"){
			header("Location:user.html");				
			}elseif($perfil=="2"){
				header("Location:userCamaras.html");
			}else{
				header("Location:admin.html");
			}
	}
 ?>