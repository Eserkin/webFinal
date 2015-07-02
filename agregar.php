<?php
session_start();
    if(isset($_SESSION["log"])){
        if($_SESSION["perfil"]=="3"){
			$nombre=$_POST["nombre"];
			$apellido=$_POST["apellido"];
			$nick=$_POST["nick"];
			$clave=md5($_POST["password"]);
			$dni=$_POST["dni"];
			$direccion=$_POST["direccion"];
			$localidad=$_POST["localidad"];
			$telefono=$_POST["telefono"];
			$mail=$_POST["email"];
			$fecha=date("Y-m-d");
			$perfil=$_POST["perfil"];
			$plan=$_POST["plan"];
			include_once("funcionSQL.php");
			$link=abriendoConexionSQL();

    		switch ($perfil) {
    			case '1':
    				if(consultaDatos("INSERT INTO usuario (nick,clave,dni,nombre,apellido,mail,registro,estado,perfil_id) VALUES ('$nick','$clave','$dni','$nombre','$apellido','$mail','$fecha','1','$perfil');")){
    					$consulta=consultaDatos("SELECT * FROM usuario WHERE nick='$nick';");
    					$line=mysql_fetch_assoc($consulta);
    					$id=$line['id'];
    					if(consultaDatos("INSERT INTO cliente (id,telefono) VALUES ('$id','$telefono');")){
    						$codigoDeDesbloqueo=rand(1000, 9999);//se autoasigna num aleatorio para el codigo del sistema
                if(consultaDatos("INSERT INTO sistema (direccion,codigo_desbloqueo,estado,cliente_id,localidad_id) VALUES ('$direccion','$codigoDeDesbloqueo','1','$id','$localidad');")){
  			   					header("Location:adminIngresarUsuarios.php?operacion=1");
  			   					desconectarSQL($link);
  			   					exit();
    						}
    					}
    				}
 					header("Location:adminIngresarUsuarios.php?operacion=0");
    				desconectarSQL($link);
    				exit();
    				break;
    			case '2':
    				if(consultaDatos("INSERT INTO usuario (nick,clave,dni,nombre,apellido,mail,registro,estado,perfil_id) VALUES ('$nick','$clave','$dni','$nombre','$apellido','$mail','$fecha','1','$perfil');")){
    					$consulta=consultaDatos("SELECT * FROM usuario WHERE nick='$nick';");
    					$line=mysql_fetch_assoc($consulta);
    					$id=$line['id'];
    					if(consultaDatos("INSERT INTO monitoreador (id,turno) VALUES ('$id','mañana');")){
  			   					header("Location:adminIngresarUsuarios.php?operacion=1");
  			   					desconectarSQL($link);
  			   					exit();
    					}
    				}
 					header("Location:adminIngresarUsuarios.php?operacion=0");
    				desconectarSQL($link);
    				exit();
    				break;
    			case '3':
    				if(consultaDatos("INSERT INTO usuario (nick,clave,dni,nombre,apellido,mail,registro,estado,perfil_id) VALUES ('$nick','$clave','$dni','$nombre','$apellido','$mail','$fecha','1','$perfil');")){
    					$consulta=consultaDatos("SELECT * FROM usuario WHERE nick='$nick';");
    					$line=mysql_fetch_assoc($consulta);
    					$id=$line['id'];
    					if(consultaDatos("INSERT INTO administrador (id) VALUES ('$id');")){
  			   					header("Location:adminIngresarUsuarios.php?operacion=1");
  			   					desconectarSQL($link);
  			   					exit();
    					}
    				}
 					header("Location:adminIngresarUsuarios.php?operacion=0");
    				desconectarSQL($link);
    				exit();
    				break;
    			default:
    				# code...
    				break;
    		}


    	}else{
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }
 ?>
