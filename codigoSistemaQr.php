<?php
  include_once("includes/phpqrcode/qrlib.php");
  include_once("funcionSQL.php");

  $link=abriendoConexionSQL();
  //provisorio:
  $consulta=consultaDatos("SELECT codigo_desbloqueo FROM sistema JOIN cliente ON sistema.cliente_id=cliente.id;");
  $codigo='El codigo de su sistema es: '.mysql_result($consulta,1);
  //solo accede a una fila especifica (1)
  QRcode::png($codigo);
  desconectarSQL($link);
 ?>
