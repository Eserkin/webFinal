<?php
  session_start();
  $id=$_SESSION["id"];
  include_once("funcionSQL.php");
  $link=abriendoConexionSQL();
  $consulta=consultaDatos("SELECT id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE cliente_id='$id';");
	$permisos=mysql_num_rows($consulta);
  $camaraId=mysql_result($coonsulta, '0');

  if($permisos == '2') {
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==1) {
        echo $camaraId;
        consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE sistema_id='$camaraId';");
      }

    }
  }
  //header("Location:userCamaras.php");
  desconectarSQL($link);
?>
