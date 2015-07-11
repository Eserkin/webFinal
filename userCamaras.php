<?php
    session_start();
    if(isset($_SESSION["log"])){
        if($_SESSION["perfil"]=="1"){
            include_once("funcionSQL.php");
            abriendoConexionSQL();
            $id=$_SESSION["id"];
            $consulta=consultaDatos("SELECT estado FROM usuario WHERE id='$id';");
            $estado=mysql_result($consulta, '0');
            if($estado=='1'){
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cliente- </title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="cleartype" content="on">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
    <link rel="shortcut icon" sizes="196x196" href="img/touch/touch-icon-196x196.png">
    <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">
    <link href="lightbox/css/lightbox.css" rel="stylesheet" />

     <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <!-- SEO: If mobile URL is different from desktop URL, add a canonical link to the desktop page -->
        <!--
        <link rel="canonical" href="http://www.example.com/" >
        -->

        <!-- Add to homescreen for Chrome on Android -->
        <!--
        <meta name="mobile-web-app-capable" content="yes">
        -->

        <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
        <!--
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="">
        -->

        <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
        <!--
        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
        -->

    <!-- Hojas de Estilo -->
    <link href="css/admin/bootstrap.css" rel="stylesheet" />
    <link href="css/admin/font-awesome.css" rel="stylesheet" />
    <link href="css/admin/estilos.css" rel="stylesheet" />

    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trident</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Administrador</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hoy</em>
                                    </span>
                                </div>
                                <div>En respuesta a su pregunta, le comento que....... </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver todos los mensajes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->


                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="olvidar.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->


        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="userIndex.php"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>

                    <li>
                        <a class="active-menu" href="userCamaras.php"><i class="fa fa-video-camera"></i> Cámaras IP</a>
                    </li>
                    <li>
                        <a href="userFactura.php"><i class="fa fa-money"></i> Facturas</a>
                    </li>
                    <li>
                        <a href="userPlan.php"><i class="fa fa-arrow-circle-o-down"></i> Planes</a>
                    </li>

                    <li>
                        <a href="userContacto.php"><i class="fa fa-envelope-o"></i> Contacto</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Cámaras IP- <small>en vivo</small>
                        </h1>
                    </div>
                </div>

			    <div class="row">
                    <!--  Cámara Ip1-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              Cámara IP 1
                              <?php
                                $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                $permisos=mysql_num_rows($consultaPermiso);
                                if($permisos > 0) {
                                  $permitirMonitoreo=mysql_result($consultaPermiso, '0');
                                }
                              ?>
                              <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=1'">
                                <span class="glyphicon glyphicon-facetime-video"></span>
                                <?php if(!isset($permitirMonitoreo)) { echo " Deshabilitado"; } elseif($permitirMonitoreo=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                              </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                $consulta=consultaDatos("SELECT url FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                $urls=mysql_num_rows($consulta);
                                if($urls > 0) {
                                  $urlUno=mysql_result($consulta,'0');
                                  echo "<a href=$urlUno data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>

                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip1-->

                    <!--  Cámara Ip2-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cámara IP 2
                                <?php
                                  $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                  $permisos=mysql_num_rows($consultaPermiso);
                                  if($permisos == 2 OR $permisos == 6) {
                                    $permitirMonitoreoDos=mysql_result($consultaPermiso, '1');
                                  }
                                ?>
                                <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=2'">
                                  <span class="glyphicon glyphicon-facetime-video"></span>
                                  <?php if(!isset($permitirMonitoreoDos)) { echo " Deshabilitado"; } elseif($permitirMonitoreoDos=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                                </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                if($urls > 0) {
                                  $urlDos=mysql_result($consulta,'1');
                                  echo "<a href=$urlDos data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip2-->
                 </div><!-- End ROW-->

                 <div class="row">
                    <!--  Cámara Ip3-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cámara IP 3
                                <?php
                                  $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                  $permisos=mysql_num_rows($consultaPermiso);
                                  if($permisos > 2) {
                                    $permitirMonitoreoTres=mysql_result($consultaPermiso, '2');
                                  }
                                ?>
                                <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=3'">
                                  <span class="glyphicon glyphicon-facetime-video"></span>
                                  <?php if(!isset($permitirMonitoreoTres)) { echo " Deshabilitado"; } elseif($permitirMonitoreoTres=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                                </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                if($urls > 2) {
                                  $urlTres=mysql_result($consulta,'2');
                                  echo "<a href=$urlTres data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip3-->

                    <!--  Cámara Ip4-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cámara IP 4
                                <?php
                                  $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                  $permisos=mysql_num_rows($consultaPermiso);
                                  if($permisos > 2) {
                                    $permitirMonitoreoCuatro=mysql_result($consultaPermiso, '3');
                                  }
                                ?>
                                <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=4'">
                                  <span class="glyphicon glyphicon-facetime-video"></span>
                                  <?php if(!isset($permitirMonitoreoCuatro)) { echo " Deshabilitado"; } elseif($permitirMonitoreoCuatro=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                                </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                if($urls > 2) {
                                  $urlCuatro=mysql_result($consulta,'3');
                                  echo "<a href=$urlTres data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip4-->

                    <!--  Cámara Ip5-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cámara IP 5
                                <?php
                                  $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                  $permisos=mysql_num_rows($consultaPermiso);
                                  if($permisos > 2) {
                                    $permitirMonitoreoCinco=mysql_result($consultaPermiso, '4');
                                  }
                                ?>
                                <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=5'">
                                  <span class="glyphicon glyphicon-facetime-video"></span>
                                  <?php if(!isset($permitirMonitoreoCinco)) { echo " Deshabilitado"; } elseif($permitirMonitoreoCinco=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                                </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                if($urls > 2) {
                                  $urlCinco=mysql_result($consulta,'4');
                                  echo "<a href=$urlCinco data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip5-->

                    <!--  Cámara Ip6-->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cámara IP 6
                                <?php
                                  $consultaPermiso=consultaDatos("SELECT permitir_monitoreo FROM camaras JOIN sistema ON camaras.sistema_id=sistema.id WHERE sistema.cliente_id='$id';");
                                  $permisos=mysql_num_rows($consultaPermiso);
                                  if($permisos > 2) {
                                    $permitirMonitoreoSeis=mysql_result($consultaPermiso, '5');
                                  }
                                ?>
                                <button type="button" class="btn btn-default btn-xs pull-right" onclick="location.href='permisoCamaras.php?numCamara=6'">
                                  <span class="glyphicon glyphicon-facetime-video"></span>
                                  <?php if(!isset($permitirMonitoreoSeis)) { echo " Deshabilitado"; } elseif($permitirMonitoreoSeis=='1') { echo " Bloquear monitoreo"; } else { echo " Permitir monitoreo"; } ?>
                                </button>
                            </div>
                            <div class="panel-body">
                              <?php
                                if($urls > 2) {
                                  $urlSeis=mysql_result($consulta,'5');
                                  echo "<a href=$urlSeis data-lightbox='Mi ipCam 1' data-title='Mi ipCam 1'>Ver</a>";
                                }
                                else echo "<p style='color:red;'>No disponible</p>";
                              ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Cámara Ip6-->

                 </div><!-- End ROW->

             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="js/vendor/jquery-2.1.0.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="js/admin/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="js/admin/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="js/admin/custom.js"></script>
      <!-- lightbox Js -->
    <script src="js/lightbox.min.js"></script>

</body>
</html>
<?php
        }else{
            header("Location:userIndex.php?estado=0");
            exit();
        }
     }else{
            header("Location:index.php");
            exit();
        }
    }else{
        header("Location:index.php");
    }

 ?>
