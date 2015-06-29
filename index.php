<?php 
    if(isset($_GET['validacion'])){
        $validacion=1;
    }else{
        $validacion=0;
    }
    if(isset($_COOKIE["perfil"])){
        include_once("redirigirPerfil.php");
        redirigirPerfil($_COOKIE["perfil"]);
    }
    session_start();
    if (isset($_SESSION["log"])){
        include_once("redirigirPerfil.php");
        redirigirPerfil($_SESSION["perfil"]);
    }else{

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
    
    <body>
        <div id="parallax">
            <img src="img/back3.png" alt="">
        </div>
        
        <header>
            <a href="index.php" title="Sistema para controlar alarmas online"></a>
        </header>
        
        <div class="login_container">

            <div class="holder_register">
                <div id='cliente_imagen'>
                    <div class="circulo"></div>
                </div>
                
                <div id="cliente_nombre">
                    <p>Usuario</p>
                </div>
            </div>


            <div id="login-holder">
                
                <div id="login-titulo">Iniciar sesión</div>

                <!--  comienza login-inner -->
                <div id="login-inner">

                    <form action="validacion.php" method="post" accept-charset="utf-8">

                        <div style="display:none">
                            <input type="hidden" name="turnocheck_nonce" value="18755f823fea022f617eb2c21c1208e8" />
                        </div>   
                    
                            <div id='login_input_container'>
                                
                                <p class="campo">
                                    <input type="text" name="login" value="" id="login" maxlength="80" class="login-inp clearfix" placeholder="Nick..."  />
                                    <span class="icon-user"></span> 
                                </p>
                                    <!-- Si viene el fb_id  === true quiere decir que estoy asociando la cuenta de facebook del usuario con la de turnocheck -->
                                
                                <p class="campo">
                                    <input type="password" name="password" value="" id="password" class="login-inp clearfix" onfocus="this.value=''"placeholder="Clave..."  />
                                    <span class="icon-lock"></span> 
                                </p>
                                <p color="red">
                                    <?php 
                                        if ($validacion){
                                            ?>
                                              <p style="color:red;">Ha ingresado mal el usuario o contraseña.</p>  
                                            <?php
                                        }
                                     ?>
                                </p>

                                <p class="submit-login">
                                    <button type="submit" name="submit">
                                        <span class="icon-arrow-right"></span>
                                    </button>
                                </p>

                            </div><!-- Cierre de login input container-->

                        <div id="checkbox_inputs_container">
                                <input type="checkbox" name="recordar" value="1" id="login-check" class="checkbox-size"  />        
                                <label for="login-check" id="label_recordarme">Recordarme</label>
                                <a href="forgot_password" >Olvidé mi contraseña</a>    
                        </div>


                        <div id="login_forgot"></div>

                    </form>
                    <!--  Fin de formulario -->
                </div>
                <!--  Fin de login-inner -->
            </div>
            <!--  Fin de login-holder -->
        
        </div>
        <!--  Fin de login -->



        <script src="js/vendor/jquery-2.1.0.min.js"></script>
        <script src="js/helper.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
<?php 
}
 ?>
