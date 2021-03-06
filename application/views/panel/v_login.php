<!DOCTYPE html> 
<html>
<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="SAP Partner Marketing, Directorio de Servicios">
    <meta name="keywords"               content="SAP Partner Marketing">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="May 7, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
    <title>SAP Partner Marketing | Directorio de Servicios</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
</head>
<body>
    
 <?php 
  ?>
    <section id="principal">
        <div id="home" class="js-window">
            <div class="js-header">
                <img src="<?php echo RUTA_IMG?>logo/logo-sap__run.png">
                <!--     <div class="js-idioma">
                        <select class="selectpicker" id="idioma"  name="idioma" onchange="cambiarIdioma()">
                            <option value="Español">Espa&ntilde;ol</option>
                            <option value="Inglés" disabled="true">English</option>
                            <option value="Portugués">Portugu&ecirc;s</option>
                        </select>
                    </div> -->
                </div>
                <div class="js-title">
                    <p></p>
                    <h1><strong>SAP Partner<!-- Directorio de Servicios --></strong></h1>
                    <span></span>
                    <button class="btn " data-toggle="modal" data-target="#ModalLogin">Ingresar</button>
                </div>
                <div class="js-bar">
                    <div class="js-bar__children"></div>
                    <div class="js-bar__children"></div>
                    <div class="js-bar__children"></div>
                </div>
                <div class="js-fondo__imagen" style="background-image: url('<?php echo RUTA_IMG?>fondo/fondoadmin.jpg')"></div>
            </div>
        </section> 
        <!-- Modal -->
        <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="js-card-login">
                        <div class="mdl-card__supporting-text">
                            <div class="col-xs-12 p-0 js-login">
                                <div class="col-xs-8 p-l-0">
                                    <h2>Administración de Partners</h2>
                                </div>
                                <div class="col-xs-4 p-0 text-center">
                                    <img src="<?php echo RUTA_IMG?>cards/login.png">
                                </div>
                            </div>
                            <div class="col-xs-12 p-0">
                                <p>Acceso Administrador</p>
                            </div>
                            <form id="frmLogin" autocomplete="off">
                                <div class="col-xs-12 js-input p-0">
                                    <input type="text" id="user" name="user" class="form-control" placeholder="User" autofocus="">
                                </div>
                                <div class="col-xs-12 js-input p-0">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
                                </div>
                                <div class="col-xs-12 mdl-card__actions text-right p-r-0">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>loginPanel.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }

            // $(window).load(function(){
            //     var URLactual = window.location;
            //     if(URLactual['href'] != 'http://www.sap-latam.com/ebook/pbc/es/' || URLactual['href'] == 'http://www.sap-latam.com/ebook/pbc' || URLactual['href'] == 'http://www.sap-latam.com/ebook'){
            //         location.href = 'http://www.sap-latam.com/ebook/pbc/es/';
            //     }
            // });

        </script>
    </body>
    </html>