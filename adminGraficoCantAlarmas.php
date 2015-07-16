<?php 
    session_start();
    if(isset($_SESSION["log"])){
        if($_SESSION["perfil"]=="3"){

?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador- Control de usuarios</title>
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
                                    <strong>Cliente 1</strong>
                                    <span class="pull-right text-muted">
                                        <em>Hoy</em>
                                    </span>
                                </div>
                                <div>Hola quisera ampliar el servicio y contratar el plan avanzado que incluye alarmas </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Cliente 5</strong>
                                    <span class="pull-right text-muted">
                                        <em>Ayer</em>
                                    </span>
                                </div>
                                <div>Hola, mi alarma esta andando mal, necesito un técnico que la revise.</div>
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
                        <a href="index.php"><i class="fa fa-dashboard"></i> Estadísiticas<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level" >
                            <li>
                                <a href="adminGraficoClientes.php">
                                    <i class="fa fa-pie-chart"></i>Clientes por zona
                                </a>
                            </li>
                            <li>
                                <a class="active-menu" href="adminGraficoCantAlarmas.php">
                                    <i class="fa fa-bar-chart"></i>Cantidad de alarmas
                                </a>
                            </li>
                            <li>
                                <a href="adminGraficoAlarmasFecha.php">
                                    <i class="fa fa-line-chart"></i>Disparos por fecha
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="adminUsuarios.php"><i class="fa fa-users"></i></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="adminAlarmasHistorial.php"><i class="fa fa-table"></i> Histórico de Alarmas</a>
                    </li>
                    <li>
                        <a href="adminCobros.php"><i class="fa fa-money"></i></i> Cobros</a>
                    </li>
                    
                    <li>
                        <a href="adminIngresarUsuarios.php"><i class="fa fa-user-plus"></i> Ingresar Usuario </a>
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
                            Estadísticas-<br> 
                            <small>Cantidad de Alarmas disparadas y factor de alarmas reales/falsas.</small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->

                 <div class="row"> 
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">                     
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gráfico de barras
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart">
								<?php
								echo "<img src='graficoDosBarras.php' width='600px' height='400px'/>";
                               
								?>	
								
								</div>
                            </div>
                        </div>            
                    </div> 
                
                 </div>
             
                <div class="row"> 
                      
                    <div class="col-md-6 col-sm-12 col-xs-12">                     
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gráfico de torta
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart">
								<?php
								echo "<img src='graficoTortasDos.php' width='600px' height='400px'/>";
								?>	
								</div>
                            </div>
                        </div>            
                    </div>
                
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