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
                            if(consultaDatos("INSERT INTO sistema (direccion,codigo_desbloqueo,estado,cliente_id,localidad_id) VALUES ('$direccion','$codigoDeDesbloqueo','0','$id','$localidad');")){
  			   					include_once ("primerDia.php");
                                $fecha=primerDia();                                    
                                    switch ($plan) {
                                        case '1':
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','5200.00','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('1','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('4','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1");
                                                            desconectarSQL($link);
                                                            exit();
                                                        }
                                                    }
                                                }
                                               //saque tabla pago, modificar detalle para ordenar por plan en ves de productos, van a haber muchos registros al pedo ya que nunca se filtra o es necesario, poner monto en la factura dependiendo del tipo de plan, hacer tabla plan con ltodos los planes y su monto y linkearla con la tabla factura
                                            
                                            break;
                                        case '2':
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','7400.00','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('2','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('5','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1");
                                                            desconectarSQL($link);
                                                            exit();
                                                        }
                                                    }
                                                }
                                            break;
                                        case '3':
                                                if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','8250.00','1','0','$id');")){
                                                    $consulta=consultaDatos("SELECT * FROM factura WHERE cliente_id='$id';");
                                                    $line=mysql_fetch_assoc($consulta);
                                                    $factura=$line['id'];
                                                    if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('3','$factura');")){
                                                        if(consultaDatos("INSERT INTO detalle (producto_id,factura_id) VALUES ('6','$factura');")){
                                                            header("Location:adminIngresarUsuarios.php?operacion=1");
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
