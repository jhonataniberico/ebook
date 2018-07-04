function ingresar(){
	var usuario  = $('#usuario').val();
  var email    = $('#email').val();
  var pais     = $('#pais').val();
  if(email == null || email == ''){
    msj('error', 'Ingrese su email');
    return;
  }
	if(usuario == null || usuario == ''){
    msj('error', 'Ingrese su usuario');
		return;
	}
  if(pais == null || pais == ''){
    msj('error', 'Seleccione su pais');
    return;
  }
  if(!validateEmail(email)){
    msj('error', 'El formato de email es incorrecto');
    return;
  }
  if(validateEmailCorporative(email)){
    msj('error', 'Ingrese su email corporativo');
    return;
  }
	$.ajax({
		data : {id_partner  : usuario,
            email       : email,
            pais        : pais},
		url  : 'pt/Login/ingresar',
		type : 'POST'
	}).done(function(data){
		try{
        data = JSON.parse(data);
        if(data.error == 0){
          location.href = 'pt/Home';
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
function registrar() {
  var pais         = $('#pais').val();
  var partner_id   = $('#partnerId').val();
  var user         = $('#userRegis').val();
  var email        = $('#emailRegis').val();
  var pass         = $('#passRegister').val();
  var nombre       = $('#nombresRegis').val();
  var apellido     = $('#apellidosRegis').val();

  if(pais == ''){
    msj('error', 'Ingrese su país');
    return;
  }
  if(partner_id == ''){
    msj('error', 'Ingrese su partner ID');
    return;
  }
  if(user == ''){
    msj('error', 'Ingrese su usuario');
    return;
  }
  if(email == ''){
    msj('error', 'Ingrese su Email');
    return;
  }
  if (!validateEmail(email)){
    msj('error', 'El formato del correo es incorrecto');
    return;
  }
  if(pass == ''){
    msj('error', 'Ingrese su contraseña');
    return;
  }
  if(nombre == null || nombre == undefined || nombre == ''){
    msj('error', 'Ingrese su nombre');
    return;
  }
  if(apellido == ''){
    msj('error', 'Ingrese su apellido');
    return;
  }
  $.ajax({
    data : {partner_id : partner_id,
            usuario    : user,
            email      : email,
            pass       : pass,
            nombre     : nombre,
            apellido   : apellido,
            pais       : pais},
    url  : 'pt/Login/registrar',
    type : 'POST'
  }).done(function(data){
    try{
        data = JSON.parse(data);
        if(data.error == 0){
          $('#pais').val("");
          $('#partnerId').val("");
          $('#userRegis').val("");
          $('#emailRegis').val("");
          $('#passRegister').val("");
          $('#nombresRegis').val("");
          $('#apellidosRegis').val("");
          $('#passRegister').val("");
          $('#pais').val("");
          msj('error', 'Se registró correctamente');
        }else {
          msj('error', 'Su usuario o contraseña son incorrectos');
          return;
        }
      }catch(err){
        msj('error',err.message);
      }
  });
}
function getIdsPartner(){
  var pais = $('#pais').val();
  $.ajax({
    data : {pais : pais},
    url  : 'pt/Login/getIdsPartner',
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
        location.href = 'http://www.sap-latam.com/ebook/pbc/es';
    }else if(idioma == 'Portugués'){
        location.href = 'http://www.sap-latam.com/ebook/pbc/pt';
    }
}