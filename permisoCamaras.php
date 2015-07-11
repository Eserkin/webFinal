<?php
  session_start();
  $id=$_SESSION["id"];
  include_once("funcionSQL.php");
  $link=abriendoConexionSQL();
  $consultaPermiso=consultaDatos("SELECT camaras.permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
	$filasCamara=mysql_num_rows($consultaPermiso);
  

  if($filasCamara == '2' OR $filasCamara == '6') {
    //camara 1
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==1) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, '0');
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        echo "estado de camara= ".$estadoCamara;
        echo "numero de camara= ".$numCamara;
        echo "filas de camara=".$filasCamara;
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
    //camara 2
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==2) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, 0+1);
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        echo "estado de camara= ".$estadoCamara;
        echo "numero de camara= ".$numCamara;
        echo "filas de camara=".$filasCamara;
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
    //camara 3
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==3) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, 0+2);
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
    //camara 4
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==4) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, 0+3);
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
    //camara 5
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==5) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, 0+4);
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
    //camara 6
    if(isset($_GET["numCamara"])) {
      if($_GET["numCamara"]==6) {
        $numCamara=$_GET["numCamara"];
        $consultaIdCamaras=consultaDatos("SELECT camaras.id FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
        $idsCamara=mysql_result($consultaIdCamaras, 0+5);
        $estadoCamara=mysql_result($consultaPermiso, $numCamara-1);
        if($estadoCamara == 1) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='0' WHERE id='$idsCamara';");
        }
        elseif($estadoCamara == 0) {
          consultaDatos("UPDATE camaras SET permitir_monitoreo='1' WHERE id='$idsCamara';");
        }
      }
    }
  }
  desconectarSQL($link);
  header("Location:userCamaras.php");
  echo '<script lenguage="javascript">alert("no paso por el if");</script>';
  
?>
