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
        <section id="principal" class="section">
            <div class="js-fondo-datos"></div>
            <div class="js-container">
                <div class=" js-carousel">
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
                    <div class="form-group js-input">
                        <!-- <label for="user">S User</label>
                        <input type="email" class="form-control" id="user" readonly="readonly" value="<?php echo $name_user ?>"> -->
                    </div>
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
                        <!-- NO BORRAR -->
                        <!-- <label for="mdf">Ver MDFs disponibles</label> -->
                        <!-- <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="exportExcel()">Ver MDFs disponibles</button> -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Ver MDFs disponibles</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="js-container js-container--responsive">
                    <div class="col-xs-12 js-question--number">
                        <div class="js-partner">
                            <p><span>Pa&iacute;s: </span> <?php echo $pais ?></p>
                        </div>
                        <div class="js-filter">
                            <p id="servicioFilter"></p>
                            <p id="presupuestoFilter"></p>
                        </div>
                    </div>
                    <div class="js-carousel">
                        <!-- <div class="js-card--large">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>¿Que tipo de servicio deseas realizar?</small>
                                </div>
                            </div>
                            <div class="js-card--large__select">
                                <div class="js-select">
                                    <select class="selectpicker" id="servicio" name="servicio" title="Seleccione" onchange="getServicios(this.id);">
                                        <option value="Digital Optimization">Digital Optimization</option>
                                        <option value="Demand Generation">Demand Generation</option>
                                        <option value="Digital Content">Digital Content</option>
                                        <option value="Marketing Strategy">Marketing Strategy</option>
                                        <?php if($pais == 'Colombia'){ ?>
                                        <option value="Innovation Program4Partners">Innovation Program4Partners</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="cardPresupuesto" class="js-card--large opacity-done">
                            <div class="js-card--large__content">
                                <div class="js-card--large__content-tipo">
                                    <img src="<?php echo RUTA_IMG?>cards/inversion.png">
                                </div>
                                <div class="js-card--large__content-name">
                                    <small>¿Qué presupuesto maneja para su inversi&oacute;n?</small>
                                </div>
                            </div>
                            <div class="js-card--large__select" id="presupuestoSelect">
                                <div class="js-select quitar">
                                    <select class="selectpicker" id="presupuesto" name="presupuesto" title="Seleccione" onchange="getServicios(this.id);">
                                        <option value="1">PE Benefit</option>
                                        <option value="2">Budget < 5K Euros</option>
                                        <option value="3">Budget 5K - 10K Euros</option>
                                        <option value="4">Budget > 10K Euros</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="js-card--large">
                            <div class="js-flex">
                                <div class="js-card--large__content">
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
                            <div class="js-relative">
                                <div class="js-flex js-absolute js-left">
                                    <div class="js-card__servicio">
                                        <div class="js-card__servicio--contenido">
                                            <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                            <p>Digital Optimization</p>
                                        </div>
                                        <button id="button1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                    </div>
                                    <div class="js-card__servicio">
                                        <div class="js-card__servicio--contenido">
                                            <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                            <p>Demand Generation</p>
                                        </div>
                                        <button id="button2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                    </div>
                                    <div class="js-card__servicio">
                                        <div class="js-card__servicio--contenido">
                                            <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                            <p>Digital Content</p>
                                        </div>
                                        <button id="button3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                    </div>
                                    <div class="js-card__servicio">
                                        <div class="js-card__servicio--contenido">
                                            <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                            <p>Marketing Strategy</p>
                                        </div>
                                        <button id="button4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                    </div>
                                    <?php if($pais == 'Colombia') {?>
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>Innovation Program4Partners</p>
                                            </div>
                                            <button id="button5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getServicios(this.id)">Seleccione</button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div id="cardPresupuesto" class="js-card--large opacity-done js-right">
                                    <div id="cardServicios" class="js-flex js-absolute">
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>PE Benefit</p>
                                            </div>
                                            <button id="Table1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                        </div>
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>Budget < 5K Euros</p>
                                            </div>
                                            <button id="Table2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                        </div>
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>Budget 5K - 10K Euros</p>
                                            </div>
                                            <button id="Table3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                        </div>
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>Budget > 10K Euros</p>
                                            </div>
                                            <button id="Table4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                        </div>
                                    </div>
                                    <div id="cardEur" class="js-flex js-absolute opacity-done">
                                        <div class="js-card__servicio">
                                            <div class="js-card__servicio--contenido">
                                                <img src="<?php echo RUTA_IMG?>cards/servicio.png">
                                                <p>EUR 728</p>
                                            </div>
                                            <button id="Table4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="getTable(this.id)">Seleccione</button>
                                        </div>
                                    </div>
                                    <!-- <div class="js-card--large__select" id="presupuestoSelect">
                                        <div class="js-select quitar">
                                            <select class="selectpicker" id="presupuesto" name="presupuesto" title="Seleccione" onchange="getServicios(this.id);">
                                                <option value="1">PE Benefit</option>
                                                <option value="2">Budget < 5K Euros</option>
                                                <option value="3">Budget 5K - 10K Euros</option>
                                                <option value="4">Budget > 10K Euros</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            
                            <!-- <div class="js-card--large__select">
                                <div class="js-select">
                                    <select class="selectpicker" id="servicio" name="servicio" title="Seleccione" onchange="getServicios(this.id);">
                                        <option value="Digital Optimization">Digital Optimization</option>
                                        <option value="Demand Generation">Demand Generation</option>
                                        <option value="Digital Content">Digital Content</option>
                                        <option value="Marketing Strategy">Marketing Strategy</option>
                                        <?php if($pais == 'Colombia'){ ?>
                                        <option value="Innovation Program4Partners">Innovation Program4Partners</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="table-responsive opacity-done">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Los paquetes disponibles en tu pa&iacute;s son:</th>
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