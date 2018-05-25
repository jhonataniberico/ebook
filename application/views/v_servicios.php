<!DOCTYPE html> 
<html>
    <head>
    	<meta charset="ISO-8859-1">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="Proyecto de desarrollo de un producto wizard online que tenga un quiz y con una unica solucion que es SAP Cloud Configurator">
        <meta name="keywords"               content="SAP Cloud Configurator">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="May 7, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>SAP Cloud Configurator</title>
        <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>bentonsans.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    	<style type="text/css">
    		.js-title p{
    			font-size: 19px !important;
    		}
    	</style>
    </head>
    <body style="background-color: #FFFFFF;margin-top: 57px;border: 1px solid;border-left: #000000;border-right: #000000;">
        <section id="principal">
            <div id="home" class="js-window">
                <div class="js-header">
                    <img src="<?php echo RUTA_IMG?>logo/logo-sap__run.png">
                    <div class="text-right" style="position: absolute;right: 80px;">
                    	<p><?php echo $nombre ?></p>
                    </div>
                    <div class="text-right" style="position: absolute;right: 10px;">
                    	<a href="">English</a>
                    </div>
                </div>
                <div class="js-header" style="border: 1px solid;border-right: #000000;border-left:  #000000;margin-top: 57px;">
                    <div class="text-center" style="position: relative;left: 800px;">
                    	<p style="font-weight: bold;text-align: center !important;">Marketing Services</p>
                    	<p style="text-align: center !important;position: relative;top: -11px;"><strong>Dorectory</strong> eBook</p>
                    </div>
                </div>
                <div class="js-title" style="color: black">
                    <p style="text-decoration: underline;font-weight: bold;">Servicios Disponibles</p>
                    <p style="">Product Overview</p>
                    <p style="">Awarness</p>
                    <p style="">Free Digital Campaign</p>
                    <p style="">Release Highlights</p>
                    <p style="">Pricing and Packaging</p>
                    <p style="">Security and Compliance</p>
                    <p style="">Business Services</p>
                    <p style="">Business Case</p>
                    <p style="">Customer References</p>
                    <p style="">Additional Products</p>
                </div>
                <div class="js-title" style="color: black">
                    <p style="color: #FCB845;">01/02</p>
                    <p style="font-size: 40px !important;font-weight: bold;">¿Cómo podemos ayudarle?</p>
                    <div class="col-xs-12" style="margin-top: 25px;">
                    	<!-- <div class="col-xs-8"> -->
                    		<div class="col-xs-4" style="border: 2px solid #FDB913;border-radius: 10%;font-size: 15px !important;max-width: 170px;">
                    			<p>¿Qué tipo de servicio deseas realizar?</p>
                    		</div>
                    		<div class="col-xs-4" style="border: 2px solid #FDB913;border-radius: 10%;margin-left: 20px;font-size: 15px !important;max-width: 170px;">
                    			<p>¿Qué tipo de servicio deseas realizar?</p>
                    		</div>
                    		<div class="col-xs-4" style="border: 2px solid #FDB913;border-radius: 10%;margin-left: 20px;font-size: 15px !important;max-width: 170px;">
                    			<p>¿Qué tipo de servicio deseas realizar?</p>
                    		</div>
                    	<!-- </div> -->
                    	<!-- <div class="col-xs-4">
                    		<p>Para mayor información u
							orientación del caso, póngase
							en contacto con su Partner
							Service Advisor asignado
							Nombre Apellido
							email@dominio.com.pe</p>
                    	</div> -->
                    </div>
				    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="abrirModal()" style="margin-left: 19px;max-width: 165px;height: 45px;">Demand Generation</button>
            		<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="abrirModal()" style="margin-left: 24px;max-width: 165px;height: 45px">Budget > 10K</button>
            		<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="abrirModal()" style="margin-left: 20px;max-width: 165px;height: 45px;">Fondos MDF vigente</button>
                    <div class="text-center">
                    	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="abrirModal()" style="background-color: #B3B3B3;">Regresar</button>
                    	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="abrirModal()" style="background-color:#00A1E4;">Avanzar</button>
                    </div>
                </div>
            </div>
        </section> 

        <!-- Modal -->
        <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content" style="background-color: #000000;border: 1px solid #FFFFFF;">
                    <div class="mdl-card card-login" style="background-color: #000000;">
                        <div class="mdl-card__supporting-text">
                        	<!-- <img src="<?php echo RUTA_IMG?>fondo/fondo-login.jpg" width="100" height="100"> -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                                <li><a href="#registro" aria-controls="registro" role="tab" data-toggle="tab">Register</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="login">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="usuario" placeholder="Email, ID or User Name" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="password" id="password" placeholder="Password" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="ingresar()">Registrarme</button>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="registro">
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="pais" placeholder="País" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="partnerId" placeholder="Partner ID" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="userRegis" placeholder="S User" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="email" id="emailRegis" placeholder="Email">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="password" id="passRegister" placeholder="Password" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="nombresRegis" placeholder="Nombres" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 form-group mdl-input">
                                        <input type="text" id="apellidosRegis" placeholder="Apellidos" onkeyup="verificarDatos(event);">
                                    </div>
                                    <div class="col-xs-12 mdl-card__actions text-right">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="registrar()">Registrarme</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-card__menu">
                            <button class="mdl-button mdl-js-button mdl-button--icon" onclick="closeModal()"><i class="mdi mdi-close"></i></button>
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
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>