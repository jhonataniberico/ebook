function getServicios(){
	var servicio 	= $('#servicio').val();
	var presupuesto = $('#presupuesto').val();
	if(servicio == null || servicio == ''){
		// $('.opacity-done').removeClass('animated fadeInRight');
		// $('.opacity-done').addClass('animated fadeOutRight');
		return;
	}
	$('#cardPresupuesto').addClass('animated fadeInRight');
	if(presupuesto == null || presupuesto == ''){
		// $('.opacity-done').removeClass('animated fadeInRight');
		// $('.opacity-done').addClass('animated fadeOutRight');
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