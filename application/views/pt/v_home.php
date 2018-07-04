<!DOCTYPE html> 
<html>
    <head>
    	<meta charset="ISO-8859-1">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="SAP Partner Marketing, Diret&oacute;rio de Serviços">
        <meta name="keywords"               content="SAP Partner Marketing">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="May 7, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>SAP Partner Marketing | Diret&oacute;rio de Serviços</title>
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
                            <label for="pais">Pais</label>
                            <input type="email" class="form-control" id="pais" readonly="readonly" value="<?php echo $pais ?>">
                        </div>
                        <div class="form-group js-input js-button--form">
                            <a href="https://pwp.sap.com/sap/bc/bsp/sap/crm_ui_start/default.htm?sap-language=EN" target="_blank" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Revise seus MDFs dispon&iacute;veis aqui</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="js-section">
            <div class="js-container js-container--responsive">
                <div class="col-xs-12 js-question--number">
                    <div class="js-help">
                        <p>Necesitas ayuda&#63;</p>
                        <a href="mailto:julia.maciel@sap.com?cc=marina.mariotto@sap.com" class="mdl-button mdl-js-button mdl-button--icon"><i class="mdi mdi-email"></i></a>
                    </div>
                    <div class="js-partner">
                        <p><span>Pais: </span> <?php echo $pais ?></p>
                    </div>
                    <div class="js-filter">
                        <ul class="breadcrumb">
                            <li><a id="servicioFilter">Serviço</a></li>
                            <li><a id="presupuestoFilter">Orçamento</a></li>
                        </ul>
                    </div>
                </div>
                <div class="js-carousel">
                    <div class="js-servicio js-flex">
                        <div class="js-card--large__content">
                            <div class="js-card--large__content-tipo">
                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                            </div>
                            <div class="js-card--large__content-name">
                                <small>Que tipo de serviço você deseja realizar&63;</small>
                            </div>
                        </div>
                        <div class="js-flex opacity-done js-right">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/inversion.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>Qual o orçamento disponível para o seu investimento&#63;</small>
                                </div>
                            </div>
                            <img class="js-flecha" src="<?php echo RUTA_IMG?>cards/flecha.png" onclick="obtenerServicios();">
                        </div>
                    </div>
                    <div class="js-cards">
                        <div class="js-flex js-absolute js-left js-width">
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/optimization.png">
                                    <p>Optimização Digital</p>
                                </div>
                                <button id="button1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/generation.png">
                                    <p>Geração de Demanda</p>
                                </div>
                                <button id="button2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/content.png">
                                    <p>Conteúdo Digital</p>
                                </div>
                                <button id="button3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                            </div>
                            <div class="js-card__servicio">
                                <div class="js-card__servicio--contenido">
                                    <img src="<?php echo RUTA_IMG?>cards/strategy.png">
                                    <p>Estrat&eacute;gia de Marketing</p>
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
                                        <p>Gratuito</p>
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
                                        <p>Budget entre 5K - 10K Euros</p>
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
                                    <th>Os pacotes disponíveis no seu país são:</th>
                                </tr>
                            </thead>
                            <tbody class="tabla"></tbody>                                
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="js-button--flat">
            <a href="mailto:julia.maciel@sap.com?cc=marina.mariotto@sap.com" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect js-button--animation"><i class="mdi mdi-email"></i></a>
        </div>
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
        <script src="<?php echo RUTA_JS?>index_pt.js?v=<?php echo time();?>"></script>
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