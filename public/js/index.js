function getServicios(id){
	var idSelect    = $('#'+id);
	var servicio 	= $('#servicio').val();
	var presupuesto = $('#presupuesto').val();
	idSelect.parents('.js-select').addClass('selected');
	if(servicio == null || servicio == ''){
		return;
	}
	if(servicio == 'Innovation Program4Partners'){
		$('.quitar').html('');
		$('.quitar').append('<select class="selectpicker" id="presupuesto" name="presupuesto" title="Seleccione" onchange="getServicios(this.id);">'+
                                '<option value="5">EUR 728</option>'+
                            '</select>');
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        componentHandler.upgradeAllRegistered();
	}else {
		$('.quitar').html('');
		$('.quitar').append('<select class="selectpicker" id="presupuesto" name="presupuesto" title="Seleccione" onchange="getServicios(this.id);">'+
                                '<option value="1">PE Benefit</option>'+
                                '<option value="2">Budget < 5K Euros</option>'+
                                '<option value="3">Budget 5K - 10K Euros</option>'+
                                '<option value="4">Budget > 10K Euros</option>'+
                            '</select>');
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        componentHandler.upgradeAllRegistered();
	}
	$('#cardPresupuesto').addClass('animated fadeInRight');
	if(presupuesto == null || presupuesto == ''){
		return;
	}
	$('.opacity-done').addClass('animated fadeInRight');
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
        }else{
        	return;
        }
      } catch (err){
        msj('error',err.message);
      }
	});
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