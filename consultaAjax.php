<?php 
if(isset($_GET["consulta"])){
	include_once("funcionSQL.php");
	$LINK=abriendoConexionSQL();
	$consulta=consultaDatos("SELECT cliente.id clienteID,sistema.id sistemaID FROM cliente JOIN sistema ON cliente.id=sistema.cliente_id;");
	                    while ($linea=mysql_fetch_array($consulta)){
	                        $sistemaID=$linea["sistemaID"];
	                        $clienteID=$linea["clienteID"];
								$handler = curl_init("http://181.171.231.235/alarmas/consulta.php?accion=C&usuario=grupo11&password=e57a8a52b627f5939eadae00feb1f1a7&sistema=$sistemaID&cliente=$clienteID");  
								curl_setopt($handler, CURLOPT_RETURNTRANSFER, 1);
								$response = curl_exec ($handler);
								$letra=substr($response,-4,1);
								$consultaLetra=consultaDatos("SELECT id FROM evento WHERE abreviatura='$letra';");
								$letraID=mysql_result($consultaLetra, '0');
								switch ($letra) {
									case 'E':
										$consultaEstado=consultaDatos("SELECT estado FROM sistema WHERE id='$sistemaID';");
										echo "entra";
										$estado=mysql_result($consultaEstado, '0');
										echo ".$estado";
										if($estado == '1'){
											consultaDatos("UPDATE sistema SET estado='0' WHERE id='$sistemaID';");
											$consultaDisparo=consultaDatos("SELECT id FROM disparo WHERE sistema_id='$sistemaID' AND id=(SELECT MAX(id) FROM disparo WHERE sistema_id='$sistemaID');");
											$idUltimo=mysql_result($consultaDisparo, '0');
											$fecha=date("Y-m-d H:i:s");
											consultaDatos("UPDATE disparo SET fecha_finalizacion='$fecha' WHERE id='$idUltimo';");
										}
										break;
									case 'B':
									case 'C':
									case 'A':
										$consultaEstado=consultaDatos("SELECT estado FROM sistema WHERE id='$sistemaID';");
										$estado=mysql_result($consultaEstado, '0');
										if($estado == '0'){
												consultaDatos("UPDATE sistema SET estado='1' WHERE cliente_id='$clienteID';");
												$fecha=date("Y-m-d H:i:s");
												consultaDatos("INSERT INTO disparo(fecha_inicio,factor,sistema_id,evento_id) VALUES ('$fecha','1','$sistemaID','$letraID'); ");
										}
										break;
								}
								echo "Cliente: ".$clienteID." // ".$letra."--------";
						}
	//header('Content-type: application/json; charset=utf-8');
	echo "OK"; 

	desconectarSQL($LINK);	
}
 ?>