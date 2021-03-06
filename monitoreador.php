<?php 
    session_start();
    if(isset($_SESSION["log"])){
        if($_SESSION["perfil"]=="2"){
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
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
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/simplegrid.css" />
        
        <!--Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>


        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    
    <body onload="load()" >

        <header>
            <a href="index.html" title="Sistema para controlar alarmas online"></a>
        </header>
        
        <div id="map">
            
        </div>
        <!--  Fin de googlemaps -->

        <div id="cerrar-sesion">
            <a href="olvidar.php"><span>X</span> Cerrar Sesión </a>
        </div>



        <script src="js/vendor/jquery-2.1.0.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="js/helper.js"></script>
        <script src="js/main.js"></script>
        <script src="js/admin/jquery.metisMenu.js"></script>
        <script src="js/admin/custom.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/mapa.js"></script>
             <script>
            var consultaAjax = function(){
                        var data = "consulta=1" ;    
                        $.ajax({
                            type:"GET",
                            url: "consultaAjax.php",
                            data: data,
                            error: function (XMLHttpRequest, textStatus, errorThrown)
                                    {
                                        alert(errorThrown);
                                        console.log(errorThrown)
                                    }
                                        
                            ,success: function (ajaxResponse, textStatus)
                                    {
                                            console.log(ajaxResponse);
                                            return;
                                    }
                        });

                 }; 
            function refrescar(){
                consultaAjax();
                load();
            }
            $(document).ready(function() {
                var refreshID=setInterval(refrescar, 20000);
            });
            
            
        </script>
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
