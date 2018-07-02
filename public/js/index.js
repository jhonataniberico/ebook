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
        $('#low').css('display', 'none');
        $('#medium').css('display', 'none');
        $('#high').css('display', 'none');
	} else {
        $('#cardEur').css('display', 'none');
        $('#low').css('display', 'block');
        $('#medium').css('display', 'block');
        $('#high').css('display', 'block');
    }
    if(servicio != 'Digital Optimization') {
        $('#PEBenefit').css('display', 'none');
    } else {
        $('#PEBenefit').css('display', 'block');
    }
    $('.js-left').addClass('animated fadeOutLeft');
    $('.js-right').addClass('animated fadeInRight');
    $('#servicioFilter').text('Servicio: '+servicio);
}

function getTable(id){
    var idSelect    = $('#'+id);
    presupuesto = idSelect.siblings('.js-card__servicio--contenido').find('p').text();
    presupuesto = (presupuesto == 'Gratuito' ) ? 'PE Benefit' : presupuesto ; 
    idSelect.parents('.js-select').addClass('selected');
    if (presupuesto == 'EUR 728') {
        $('#Table5').attr({
            href   : 'https://www.google.com',
            target : '_blank'
        });
    } else {
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
        $('.table-responsive ').addClass('animated fadeInRight');
    }
}

function obtenerServicios(){
    servicio    = null;
    presupuesto = null;
    $('.js-left').removeClass('animated fadeOutLeft');
    $('.js-right').removeClass('animated fadeInRight');
    $('#cardServicios').removeClass('animated fadeInRight');
    $('.table-responsive').removeClass('animated fadeInRight');
    $('#servicioFilter').text('Servicio');
    $('#presupuestoFilter').text('Presupuesto');
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