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
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="js-header">
            <img src="<?php echo RUTA_IMG?>logo/logo-sap__run.png">
            <div class="js-user">
                <p>Directorio de Servicios SAP LAC</p>
                <a onclick="cerrarCesion()">Logout</a>
            </div>
        </div>
        <section id="principal" class="js-section m-t-50">
            <div class="js-fondo-datos"></div>
            <div class="js-container">
                <div class="js-carousel">
                    <div class="col-xs-12 js-flex p-0">
                        <div class="form-group js-input">
                            <label for="partner">Partner ID</label>
                            <input type="email" class="form-control" id="partner" readonly="readonly" value="<?php echo $partner ?>">
                        </div>
                        <div class="form-group js-input">
                            <label for="name_partner">Partner Name</label>
                            <input type="email" class="form-control" id="name_partner" readonly="readonly" value="<?php echo $name_partner ?>">
                        </div>
                        <div class="form-group js-input">
                            <label for="pais">País</label>
                            <input type="email" class="form-control" id="pais" readonly="readonly" value="<?php echo $pais ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 js-flex p-0">
                        <div class="form-group js-input">
                            <label for="nombre">Nombre</label>
                            <input type="email" class="form-control" id="nombre" readonly="readonly" value="<?php echo $nombre ?>">
                        </div>
                        <div class="form-group js-input">
                            <label for="apellido">Apellido</label>
                            <input type="email" class="form-control" id="apellido" readonly="readonly" value="<?php echo $apellido ?>">
                        </div>
                        <div class="form-group js-input">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" readonly="readonly" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group js-input js-button--form">
                            <a href="https://pwp.sap.com/sap/bc/bsp/sap/crm_ui_start/default.htm?sap-language=EN" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Ver MDFs disponibles</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="js-section">
            <div class="js-container js-container--responsive">
                <div class="col-xs-12 js-question--number">
                    <div class="js-partner">
                        <p><span>Pa&iacute;s: </span> <?php echo $pais ?></p>
                    </div>
                    <div class="js-filter">
                        <ul class="breadcrumb">
                            <li><a id="servicioFilter" onclick="obtenerServicios();">Servicio</a></li>
                            <li><a id="presupuestoFilter">Presupuesto</a></li>
                        </ul>
                    </div>
                </div>
                <div class="js-carousel">
                    <div class="js-servicio js-flex">
                        <div class="js-card--large__content" onclick="obtenerServicios();">
                            <div class="js-card--large__content-tipo">
                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                            </div>
                            <div class="js-card--large__content-name">
                                <small>¿Que tipo de servicio deseas realizar?</small>
                            </div>
                        </div>
                        <div class="js-card--large__content opacity-done js-right">
                            <div class="js-card--large__content-tipo">
                                <img src="<?php echo RUTA_IMG?>cards/inversion.png">
                            </div>
                            <div class="js-card--large__content-name">
                                <small>¿Qué presupuesto maneja para su inversi&oacute;n?</small>
                            </div>
                        </div>
                    </div>
                    <div class="js-cards">
                        <div class="js-flex js-absolute js-left js-width">
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/optimization.png">
                                    <p>Digital Optimization</p>
                                </div>
                                <button id="button1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/generation.png">
                                    <p>Demand Generation</p>
                                </div>
                                <button id="button2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/content.png">
                                    <p>Digital Content</p>
                                </div>
                                <button id="button3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/strategy.png">
                                    <p>Marketing Strategy</p>
                                </div>
                                <button id="button4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/solution.png">
                                    <p>Partner Solution Packages (Package4Growth)</p>
                                </div>
                                <button id="button5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <?php if($pais == 'Colombia') {?>
                                <div class="js-card__servicio">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/innovation.png">
                                        <p>Innovation Program4Partners</p>
                                    </div>
                                    <button id="button6" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                </div>
                            <?php } ?>
                        </div>
                        <div id="cardPresupuesto" class="opacity-done js-right">
                            <div id="cardServicios" class="js-flex js-width">
                                <div class="js-card__servicio" id="PEBenefit">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/benefit.png">
                                        <p>PE Benefit</p>
                                    </div>
                                    <button id="Table1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                </div>
                                <div class="js-card__servicio" id="low">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/5k.png">
                                        <p>Budget < 5K Euros</p>
                                    </div>
                                    <button id="Table2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                </div>
                                <div class="js-card__servicio" id="medium">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/10k.png">
                                        <p>Budget 5K - 10K Euros</p>
                                    </div>
                                    <button id="Table3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                </div>
                                <div class="js-card__servicio" id="high">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/15k.png">
                                        <p>Budget > 10K Euros</p>
                                    </div>
                                    <button id="Table4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                </div>
                                <div class="js-card__servicio" id="cardEur">
                                    <div class="js-card__servicio--contenido">
                                        <img src="<?php echo RUTA_IMG?>cards/728.png">
                                        <p>EUR 728</p>
                                    </div>
                                    <a id="Table5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive opacity-done">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Los paquetes disponibles en su pa&iacute;s son:</th>
                                </tr>
                            </thead>
                            <tbody class="tabla"></tbody>                                
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <form action="home/exportarExcel" id="exportarExcel" name="exportarExcel" method="post">
            <input type="hidden" name="mi_archivo">
        </form>

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
            $(document).ready(function(){
                $('.bootstrap-select').addClass('open');
            })
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>