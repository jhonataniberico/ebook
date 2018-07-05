function ingresar(){
	var usuario  = $('#usuario').val();
  var email    = $('#email').val();
  var pais     = $('#pais').val();
  if(email == null || email == ''){
    msj('error', 'Digite seu email');
    return;
  }
	if(usuario == null || usuario == ''){
    msj('error', 'Digite seu usuário');
		return;
	}
  if(pais == null || pais == ''){
    msj('error', 'Selecione seu pais');
    return;
  }
  if(!validateEmail(email)){
    msj('error', 'O formato de email está incorreto');
    return;
  }
  if(validateEmailCorporative(email)){
    msj('error', 'Digite seu email corporativo');
    return;
  }
	$.ajax({
		data : {id_partner  : usuario,
            email       : email,
            pais        : pais},
		url  : 'Login/ingresar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
          location.href = 'Home';
          $('#usuario').val("");
          $('#password').val("");
        }else {
          msj('error', data.msj);
        	return;
        }
      }catch(err){
        msj('error',err.message);
      }
	});
}
function soloLetras(e){
  key 	     = e.keyCode || e.which;
  tecla 	   = String.fromCharCode(key).toLowerCase();
  letras     = " áéíóúabcdefghijklmnñopqrstuvwxyz";
  especiales = "8-37-39-46";
  tecla_especial = false
  for(var i in especiales){
       if(key == especiales[i]){
           tecla_especial = true;
           break;
       }
   }
   if(letras.indexOf(tecla)==-1 && !tecla_especial){
       return false;
   }
 }
 function valida(e){
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==8){
      return true;
  }
  patron      =/[0-9]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}
function validateEmail(email){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validateEmailCorporative(email){
    var re = /[a-zA-Z0-9@]+(?=hotmail.com|yahoo.com|gmail.com)/;
    return re.test(email);
}
function verificarDatos(e){
	if(e.keyCode === 13){
		e.preventDefault();
		ingresar();
    }
}
function abrirModal(){
  modal('ModalLogin');
}
function getIdsPartner(){
  var pais = $('#pais').val();
  $.ajax({
    data : {pais : pais},
    url  : 'Login/getIdsPartner',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          componentHandler.upgradeAllRegistered();
          $('#divusuario').html('');
          $('#divusuario').append(data.paises);
           if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        }else {
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}
function cambiarIdioma(){
    var idioma = $('#idioma').val();
    if(idioma == 'Español'){
        location.href = '../es/';
    }else if(idioma == 'Portugués'){
        location.href = '../pt/';
    }
}