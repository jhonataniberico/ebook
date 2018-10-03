$("#frmLogin").submit(function(e) {
	e.preventDefault();
	$.ajax({
		url: 'panel/login',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		success: function(response){
			console.log(response.error);
			if (response.error==0) {
				location.reload();
			}else{
				msj('error', response.msj);
			}
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
	
	console.log("enviando");
	console.log("serial",$(this).serialize());

});


$('#ModalLogin').on('show.bs.modal', function (e) {
	// $('input:visible:enabled:first', this).focus();
	$('#user').focus();
})