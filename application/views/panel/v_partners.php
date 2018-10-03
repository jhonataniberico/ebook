!<!DOCTYPE html> 
<html lang="es">
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
	

	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_PLUGINS?>DataTables/datatables.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_PLUGINS?>DataTables/Buttons-1.5.2/css/buttons.bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_PLUGINS?>DataTables/Responsive-2.2.2/css/responsive.bootstrap.css"/>


	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>style.css?v=<?php echo time();?>">
</head>
<body>
	<div class="js-header">
		<img src="<?php echo RUTA_IMG?>logo/logo-sap__run.png">
		<div class="js-user">
			<p>Administración de Partners</p>
			<a href=" <?php echo base_url('panel/logout') ?>">Logout</a>
		</div>
	</div>
	<br><br><br>
	<section class="js-section">
		<div class="js-container js-container--responsive">
			<div class="col-xs-12 ">
				<div class="panel-body row pull-right">
					<button class="btn btn-warning" data-toggle="modal" data-target="#ModalNewPartner" data-backdrop="static"> Agregar Partner</button>
				</div>
				<table id="DataTable" class="table-striped display table " style="width:100%">
					
				</table>
			</div>

		</div>
	</section>
	 <div id="ModalNewPartner" class="modal fade" >
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="js-card-login">
                        <div class="mdl-card__supporting-text">
                            <div class="col-xs-12 p-0 js-login">
                                <div class="col-xs-8 p-l-0">
                                    <h2>Agregar de Partners</h2>
                                </div>
                            </div>
                            <form id="frmNewPartner" autocomplete="off">
                                <div class="col-xs-12 js-input p-0">
                                    <input type="text" id="idPartner" name="idPartner" class="form-control solo-numero" placeholder="ID Partner" required="" maxlength="10">
                                </div>
                                <div class="col-xs-12 js-input p-0">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre Empresa" required="">
                                </div>
                                <div class="col-xs-12 js-input js-select p-0">
                                    <select class="selectpicker" name="pais" id="pais">
                                    	<?php echo $paises; ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 mdl-card__actions text-right p-r-0">
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" type="submit">Agregar</button>
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
<!-- 	<div class="js-button--flat">
		<a href="mailto:julia.maciel@sap.com?cc=marina.mariotto@sap.com" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect js-button--animation"><i class="mdi mdi-email"></i></a>
	</div> -->
	<!-- <form action="home/exportarExcel" id="exportarExcel" name="exportarExcel" method="post">
		<input type="hidden" name="mi_archivo">
	</form> -->
	<script>

	</script>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	
	
	<script src="<?php echo RUTA_PLUGINS?>btable/bootstrap-table.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
	
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/JSZip-2.5.0/jszip.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/pdfmake-0.1.36/pdfmake.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/Buttons-1.5.2/js/dataTables.buttons.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/Buttons-1.5.2/js/buttons.bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/Buttons-1.5.2/js/buttons.flash.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/Buttons-1.5.2/js/buttons.html5.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_PLUGINS?>DataTables/Responsive-2.2.2/js/dataTables.responsive.js"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>partner.js?v=<?php echo time();?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.bootstrap-select').addClass('open');
		})
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
			// $('select').selectpicker('mobile');
		} else {
			// $('select').selectpicker();
		}
		$(document).ready(function() {
			
		});
	</script>

</body>
</html>