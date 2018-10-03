$("#idPartner").blur(function(){
	var campo=$(this);
	$.ajax({
		url: 'verificarPartner',
		type: 'POST',
		dataType: 'json',
		data: {id: campo.val()},
		success: function(response){
			console.log(response);
			if(response.error> 0){
				msj('error', response.msj);
			}
		}
	})
})

$("#frmNewPartner").submit(function(e) {
	e.preventDefault();
	var form = $(this);
	if ($("#idPartner").val()=='' || $("#name").val()=='' || $("#pais").val()=='') {
		msj('error', "Todos los campos son requeridos");
		return false;
	}
	$.ajax({
		url: 'newPartner',
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
		success: function(response){
			console.log(response);
			if(response.error > 0){
				msj('error', response.msj);
			}else{
				msj('success', response.msj);
				resetForm();
			}
		}
	})
});

var dataTable =$('#DataTable').DataTable( {
	dom: 'Bfrtip',
	lengthMenu: [
	[10, 25, 50, -1],
	['10 rows', '25 rows', '50 rows', 'Show all']
	],
	buttons: [
	'pageLength',{
		text: 'Descargar Excel',
		extend: 'excelHtml5',
		title: 'Listado Partners'

	} ],
	aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
	responsive: true,
	"ajax": "tablaPartner",
	order: [[3, "desc"]],
	"columns": [
	{
		data: null,
		defaultContent: '',
		className: 'control',
		orderable: false,
	},
	{data: "id_partner", title: "ID Partner"},
	{data: "nombre", title: "Nombre Empresa"},
	{data: "pais", title: "País"}
	]
});

function resetForm(){
	$("form")[0].reset();
	$('#pais').val('default').selectpicker("refresh");	
}

$("#ModalNewPartner").on('hidden.bs.modal', function () {	
	dataTable.ajax.reload(null, false);
});


$("#ModalNewPartner").on('show.bs.modal', function () {	
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		$('select').selectpicker('mobile');
	} else {
		$('select').selectpicker();
		$('#buttonCard1').click(function() {
			$('.logo-bottom').addClass('dnone');
		});
		$('#buttonCard5').click(function() {
			$('.chat').addClass('dnone');
		});
	}

});