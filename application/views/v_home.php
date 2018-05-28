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
    	<title>SAP | Marketing Services Directory eBook</title>
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
    </head>
    <body>
        <section id="principal">
            <div id="home" class="js-window">
                <div class="js-header">
                    <img src="<?php echo RUTA_IMG?>logo/logo-sap__run.png">
                    <div class="js-idioma">
                        <select class="selectpicker" id="IdiomaHome"  name="Idioma" onchange="cambiarIdioma()">
                            <option value="Español">Espa&ntilde;ol</option>
                            <option value="Inglés" disabled="true">English</option>
                            <option value="Portugués" disabled="true">Portugu&ecirc;s</option>
                        </select>
                    </div>
                </div>
                <div class="js-container">
                    <div class="js-question--number">
                        <span>01/02</span>
                        <h2>¿C&oacute;mo podemos ayudarle?&#63;</h2>
                    </div>
                    <div class="js-carousel">
                        <div class="js-card--large">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>Qué tipo de servicio deseas realizas?</small>
                                </div>
                            </div>
                            <div class="js-card--large__select">
                                <div class="js-select js-facturacion">
                                    <select class="selectpicker" id="servicio" name="servicio" title="Seleccione" onchange="selectFacturacion(this.id);guardarDatos()">
                                        <option value="Digital Optimization">Digital Optimization</option>
                                        <option value="Demand Generation">Demand Generation</option>
                                        <option value="Digital Content">Digital Content</option>
                                        <option value="Marketing Strategy">Marketing Strategy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="js-card--large">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/inversion.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>Qué presupuesto maneja para su inversión?</small>
                                </div>
                            </div>
                            <div class="js-card--large__select">
                                <div class="js-select js-facturacion">
                                    <select class="selectpicker" id="facturacion" name="facturacion" title="Seleccione" onchange="selectFacturacion(this.id);guardarDatos()">
                                        <option value="PE Benefit">PE Benefit</option>
                                        <option value="Budget < 5K Euros">Budget < 5K Euros</option>
                                        <option value="Budget 5K - 10K Euros">Budget 5K - 10K Euros</option>
                                        <option value="Budget > 10K Euros">Budget > 10K Euros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="js-card--large">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/fondo.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>Cuanto puede cubrir con fondos MDF?</small>
                                </div>
                            </div>
                            <div class="js-card--large__select">
                                <div class="js-select js-facturacion">
                                    <select class="selectpicker" id="facturacion" name="facturacion" title="Seleccione" onchange="selectFacturacion(this.id);guardarDatos()">
                                        <option value="PE Benefit">PE Benefit</option>
                                        <option value="Budget < 5K Euros">Budget < 5K Euros</option>
                                        <option value="Budget 5K - 10K Euros">Budget 5K - 10K Euros</option>
                                        <option value="Budget > 10K Euros">Budget > 10K Euros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>