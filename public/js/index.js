var servicio    = null;
var presupuesto = null;
function getServicios(id){
	var idSelect    = $('#'+id);
    servicio    = idSelect.siblings('.js-card__servicio--contenido').find('p').text();
	idSelect.parents('.js-select').addClass('selected');
	if(servicio == null || servicio == ''){
		return;
	}
	if(servicio == 'Innovation Program4Partners'){
        $('#cardEur').css('display', 'block');
	} else {
        $('#cardEur').css('display', 'none');
    }
    $('.js-left').addClass('animated fadeOutLeft');
    $('.js-right').addClass('animated fadeInRight');
    $('#servicioFilter').text('Servicio: '+servicio);
}

function getTable(id){
    var idSelect    = $('#'+id);
    presupuesto = idSelect.siblings('.js-card__servicio--contenido').find('p').text();
    idSelect.parents('.js-select').addClass('selected');
    $('.table-responsive ').addClass('animated fadeInRight');
    $.ajax({
        data : {tipo_servicio : servicio,
                presupuesto   : presupuesto},
        url  : 'Home/guardarServicios',
        type : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if(data.error == 0){
                $('.tabla').html('');
                $('.tabla').append(data.tabla);
                $('#presupuestoFilter').text('Presupuesto: '+presupuesto);
            }else{
                return;
            }
        } catch (err){
            msj('error',err.message);
        }
    });    
}

function obtenerServicios(){
    servicio    = null;
    presupuesto = null;
    $('.js-left').removeClass('animated fadeOutLeft');
    $('.js-right').removeClass('animated fadeInRight');
    $('#cardServicios').removeClass('animated fadeInRight');
    $('.table-responsive').removeClass('animated fadeInRight');
    $('.js-filter').find('p').text('')
}

function cerrarCesion(){
	$.ajax({
		url  : 'Home/cerrarCesion',
		type : 'POST'
	}).done(function(data){
		try{
            data = JSON.parse(data);
            if(data.error == 0){
            	location.href = 'Login';
            }else {
            	return;
            }
        }catch(err){
            msj('error',err.message);
        }
	});
}

// NO BORRAR 
// function exportExcel() {
//     $.ajax({

//     }).done(function(data){
//         try{

//         } catch (err){
//             msj('error', err.message);
//         }
//     });
//     // 
// }
