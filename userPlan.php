<?php
    session_start();
    if(isset($_SESSION["log"])){
        if($_SESSION["perfil"]=="1"){

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
                        <a href="userCamaras.php"><i class="fa fa-video-camera"></i> Cámaras IP</a>
                    </li>
                    <li>
                        <a href="userFactura.php"><i class="fa fa-money"></i> Facturas</a>
                    </li>
                    <li>
                        <a class="active-menu" href="userPlan.php"><i class="fa fa-arrow-circle-o-down"></i> Planes</a>
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
                            Planes de precios
                        </h1>
                        <?php 
                            if(isset($_GET["cambio"])){
                                if($_GET["cambio"]==1){
                                    echo "<h3 style='color:green;'> Se ha modificado el plan correctamente.</h3><br>";
                                }
                            }
                         ?>
                    </div>
             </div>
            
             <div class="row">
                     <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-danger panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-user"></i>
                            <h3>Plan Classic</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>$200 / Mes</strong></p>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Instalación completa</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Un router centralizado de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Tres sensores de presencia</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Tres sensores de cierre de aperturas</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una alarma blindada</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una batería de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Servicio técnico las 24hs</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-danger" href="cambiarPlan.php?plan=1">COMPRAR</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-warning panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-home"></i>
                            <h3>Plan Gold</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>$400 / Mes</strong></p>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Instalación completa</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Un router centralizado de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Cuatro sensores de presencia</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Cuatro sensores de cierre de aperturas</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 2 Cámara IP</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una alarma blindada</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una batería de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Servicio Técnico las 24 Hs</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-warning" href="cambiarPlan.php?plan=2">COMPRAR</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->

                <!-- item -->
                <div class="col-md-4 text-center">
                    <div class="panel panel-success panel-pricing">
                        <div class="panel-heading">
                            <i class="fa fa-building-o"></i>
                            <h3>Plan Platinum</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p><strong>$650 / Mes</strong></p>
                        </div>
                        <ul class="list-group text-center">
                            <li class="list-group-item"><i class="fa fa-check"></i> Instalación completa</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Dos router centralizado de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Seis sensores de presencia</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Seis sensores de cierre de aperturas</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> 6 Cámara IP</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una alarma blindada</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Una batería de seguridad</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Comunicador 3G</li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Servicio Técnico las 24 Hs</li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-lg btn-block btn-success" href="cambiarPlan.php?plan=3">COMPRAR</a>
                        </div>
                    </div>
                </div>
                <!-- /item -->
             </div>


			</div>
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



</body>
</html>
<?php
     }else{
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }

 ?>
