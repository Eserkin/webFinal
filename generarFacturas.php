<?php 
	session_start();
	if (isset($_SESSION["log"])) {
		if ($_SESSION["perfil"]=="3") {
			include_once ("funcionSQL.php");
			$link=abriendoConexionSQL();
			include_once("primerDia.php");
			$fecha=primerDia();
			$bandera=1;
			$consulta=consultaDatos("SELECT id,plan FROM cliente;");
			while ($linea=mysql_fetch_array($consulta)) {
				$id=$linea["id"];
				$consultaFecha=consultaDatos("SELECT fecha FROM factura WHERE cliente_id='$id' AND nro_factura=(SELECT MAX(nro_factura) FROM factura WHERE cliente_id='$id');");
				$fechaUfactura=mysql_result($consultaFecha, '0');
				if($fechaUfactura!=$fecha){
						if($linea["plan"] =="1"){
							$consultaPrecio=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='1' OR id='4';");
						}else{
							 if($linea["plan"]=="2") {
								$consultaPrecio=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='2' OR id='5';");
							 }else{
								$consultaPrecio=consultaDatos("SELECT SUM(precio) FROM producto WHERE id='3' OR id='6';");
							}
						}
						$monto=mysql_result($consultaPrecio, '0');
						$consultaFactura=consultaDatos("SELECT MAX(nro_factura) FROM factura WHERE cliente_id='$id';");
						$nro_factura=mysql_result($consultaFactura, '0');
						$nro_factura++;
						if(consultaDatos("INSERT INTO factura(fecha,monto,nro_factura,estado,cliente_id) VALUES ('$fecha','$monto','$nro_factura','0','$id'); ")){
							$bandera=1;
						}else{
							$bandera=0;
						}
				}

			}
			if($bandera==1){
				header("Location:admin.php?generacionFacturas=1");
				exit();
			}else{
				 header("Location:admin.php?generacionFacturas=0");
				 exit();
			}
		}
	}
	header("Location:index.php");

 ?>