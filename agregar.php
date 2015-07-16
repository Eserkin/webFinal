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
            $latitud=$_POST["latitud"];
            $longitud=$_POST["longitud"];
			$fecha=date("Y-m-d");
			$perfil=$_POST["rolUsuario"];
			$plan=$_POST["plan"];
			include_once("funcionSQL.php");
			$link=abriendoConexionSQL();

    		switch ($perfil) {
    			case '1':
    				if(consultaDatos("INSERT INTO usuario (nick,clave,dni,nombre,apellido,mail,registro,estado,perfil_id) VALUES ('$nick','$clave','$dni','$nombre','$apellido','$mail','$fecha','0','$perfil');")){
    					$consulta=consultaDatos("SELECT * FROM usuario WHERE nick='$nick';");
    					$line=mysql_fetch_assoc($consulta);
    					$id=$line['id'];
    					if(consultaDatos("INSERT INTO cliente (id,telefono,plan) VALUES ('$id','$telefono','$plan');")){
    						$codigoDeDesbloqueo=rand(1000, 9999);//se autoasigna num aleatorio para el codigo del sistema
                            if(consultaDatos("INSERT INTO sistema (direccion,latitud,longitud,codigo_desbloqueo,estado,cliente_id,localidad_id) VALUES ('$direccion','$latitud','$longitud','$codigoDeDesbloqueo','0','$id','$localidad');")){
  			   					include_once ("primerDia.php");
                                $fecha=primerDia();
                                    switch ($plan) {
                                        case '1':
                                                $consulta=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='1' OR id='4';");
                                                $monto=mysql_result($consulta, '0');
                                                $consulta=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
                                                $sistemaId=mysql_result($consulta, '0');
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','$monto','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('1','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('4','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1&sistema=$sistemaId&cliente=$id&camaras=0");
                                                            desconectarSQL($link);
                                                            exit();
                                                        }
                                                    }
                                                }
                                               //saque tabla pago, modificar detalle para ordenar por plan en ves de productos, van a haber muchos registros al pedo ya que nunca se filtra o es necesario, poner monto en la factura dependiendo del tipo de plan, hacer tabla plan con ltodos los planes y su monto y linkearla con la tabla factura

                                            break;
                                        case '2':
                                                $consulta=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='2' OR id='5';");
                                                $monto=mysql_result($consulta, '0');
                                                $consulta=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
                                                $sistemaId=mysql_result($consulta, '0');
                                                consultaDatos("INSERT INTO camaras (descripcion,permitir_monitoreo,url,sistema_id) VALUES(' ','1','http://64.251.85.30/mjpg/video.mjpg','$sistemaId');");
                                                consultaDatos("INSERT INTO camaras (descripcion,permitir_monitoreo,url,sistema_id) VALUES(' ','1','http://64.251.85.30/mjpg/video.mjpg','$sistemaId');");
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','$monto','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('2','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('5','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1&sistema=$sistemaId&cliente=$id&camaras=0");
                                                            desconectarSQL($link);
                                                            exit();
                                                        }
                                                    }
                                                }
                                            break;
                                        case '3':
                                                $consulta=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='3' OR id='6';");
                                                $monto=mysql_result($consulta, '0');
                                                $consulta=consultaDatos("SELECT id FROM sistema WHERE cliente_id='$id';");
                                                $sistemaId=mysql_result($consulta, '0');
                                                for ($i=1; $i<7 ; $i++) {
                                                    consultaDatos("INSERT INTO camaras (descripcion,permitir_monitoreo,url,sistema_id) VALUES(' ','1','http://64.251.85.30/mjpg/video.mjpg','$sistemaId');");
                                                }
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','$monto','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('3','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('6','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1&sistema=$sistemaId&cliente=$id&camaras=0");
                                                            desconectarSQL($link);
                                                            exit();
                                                        }
                                                    }
                                                }
                                            break;
                                    }
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
