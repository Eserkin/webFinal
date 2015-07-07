<?php
  session_start();
  $id=$_SESSION["id"];
  include_once("/phpqrcode/qrlib.php");
  include_once("funcionSQL.php");

  $link=abriendoConexionSQL();
  //provisorio:
  $consulta=consultaDatos("SELECT codigo_desbloqueo FROM sistema WHERE cliente_id='$id';");
  $line=mysql_fetch_assoc($consulta);
  $codigo='El codigo de su sistema es: '. mysql_result($consulta,'0');
  //solo accede a una fila especifica (1)
  QRcode::png($codigo);
  desconectarSQL($link);
 ?>
