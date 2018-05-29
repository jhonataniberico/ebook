function getServicios(){
	var servicio 	= $('#servicio').val();
	var presupuesto = $('#presupuesto').val();
	if(servicio == null || servicio == ''){
		return;
	}
	if(presupuesto == null || presupuesto == ''){
		return;
	}
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