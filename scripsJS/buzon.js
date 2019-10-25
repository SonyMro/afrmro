$(document).ready(function () {
	var f = new Date();
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	console.log(fecha);
	$('#txtFecha').val(fecha);
});
/*Efectos */
	setInterval(
		function() {
			apacidadMas();
			apacidadMenos();
		}, 4000);

	function apacidadMas() {
		$('.brillo').animate({
			'opacity': '0.05'
		}, "slow");
	}
	function apacidadMenos() {
		$('.brillo').animate({
			'opacity': '1'
		}, "slow");
	}
	function eliminarEfecto(id) {
		//console.log($(id).attr('id'));
		$("#"+$(id).attr('id')).removeClass('brillo2');
	}
//Etiqueta quejas y sugerencias
setInterval(
	function () {
		apacidadMas2();
		apacidadMenos2();
	}, 2000);

function apacidadMas2() {
	$('.brillo2').animate({
		'opacity': '0.05'
	}, "slow");
}

function apacidadMenos2() {
	$('.brillo2').animate({
		'opacity': '1'
	}, "slow");
}

/* Validacion de campos */
function validarCodigoPostal(cp) {
	var id=$(cp).attr('id');
	var iddiv='valCp';
	var valor = cp.value;
	$('#txtCp').val();
	if (valor.length == 5 && parseInt(valor) >= 1000 && parseInt(valor) <= 99999) {
		validarinputs(true,id,iddiv,'Muy Bien');
	}
	else {
		validarinputs(false,id,iddiv,'ERROR, POR FAVOR INGRESE SU CÓDIGO POSTAL VALIDO');
	}
}
function ValidarNombre(text) {
	var id = $(text).attr('id');
	var iddiv ='valNombre';
	if (text.value === null || text.value.length >= 3 && text.value.length<=20) {
		validarinputs(true, id, iddiv, 'Muy Bien');
	}
	else {
		validarinputs(false, id, iddiv, 'ERROR, POR FAVOR INGRESE UN NOMBRE QUE NO SUPERE LOS <b>20 CARACTERES</b>.');
	}
}
function ValidarApellido(apellido) {
	console.log(apellido.value);
	var id=$(apellido).attr('id');
	var iddiv ='valApes';
	if (apellido.value !== null && apellido.value.length >= 3 && apellido.value.length <= 90) {
		validarinputs(true, id, iddiv, 'Muy Bien');
	} else {
		validarinputs(false, id, iddiv, 'ERROR, POR FAVOR INGRESE SUS APELLIDOS QUE NO SUPEREN LOS <b>90 CARACTERES</b>.');
	}
}
function validarEdad(edad) {
	var id= $(edad).attr('id');
	var iddiv = 'valEdad';
	var Edad= parseInt(edad.value);
	console.log(Edad);
	if (Edad!=null && Edad>=18 && Edad<=99) {
		validarinputs(true, id, iddiv, 'Muy Bien');
	} else {
		validarinputs(false, id, iddiv, 'ERROR, POR FAVOR INGRESE SU EDAD CORRECTA <b> (DEBE DE ESTAR ENTRE 18 A 90 AÑOS)</b>.');
	}
}
function validarinputs(bandera,idInp,iddiv,mens) {
	console.log(bandera, idInp,iddiv);
	$('#' + iddiv).empty();
	if (bandera) {
		$("#" + idInp).removeClass('is-invalid').addClass('is-valid');
		$('#' + iddiv).removeClass('invalid-feedback').addClass('valid-feedback').append('<h6>'+mens+'</h6>');
		
	} else {
		$('#' + idInp).removeClass('is-valid').addClass('is-invalid');
		$('#' + iddiv).removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>'+mens+'</h6>');
	}
}
function validarTelefono(numero) {
	//console.log(numero.value.length);
	var id = $(numero).attr('id');
	var num = numero.value;
	console.log(num.length);
	if (num.length >= 10 && num.length<=15) {
		validarinputs(true, id,'valTel','MUY BIEN.');
		console.log('si');
	} else {
		validarinputs(false, id, 'valTel', 'ERROR DEBE DE INGRESAR UN NÚMERO CON 14 CARACTERES INCLUYENDO LA LADA');
	}
}

function validarDir(valor) {
	var id = $(valor).attr('id');
	var iddiv = 'valDir';
	var dir = valor.value;
	if (dir != null && dir != '') {
		validarinputs(true, id, iddiv, 'MUY BIEN.');
	} else {
		validarinputs(false, id, iddiv, 'ERROR DEBE DE INGRESAR UNA DIRECCIÓN VALIDA.');
		console.log('no');
	}
}
function validarComentarios(params) {
	var id=$(params).attr('id');
	var iddiv ='valQs';
	var dir=params.value;
	if (dir!=null&& dir!='') {
		validarinputs(true, id, iddiv, 'MUY BIEN.');
	} else {
		validarinputs(false, id, iddiv, 'ERROR INGRESE SUs QUEJAs Y/O SUGERENCIAS.');
	//	console.log('no');
	}
}
function validarCorreo(correo) {
  var id= $(correo).attr('id');
  var iddiv='valMail';
  var cor= correo.value;
  console.log(cor);
  var patron = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i;
	var respuesta = patron.test(correo.value);
	if (respuesta) {
		validarinputs(true, id,iddiv,'MUY BIEN.');
		console.log('si');
	} else {
			validarinputs(false, id,iddiv, 'ERROR DEBE DE INGRESAR UN CORREO VALIDO.');
		console.log('no')
	}
}
