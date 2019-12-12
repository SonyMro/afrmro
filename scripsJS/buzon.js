$(document).ready(function () {
	var f = new Date();//Obtnemos un nueva fecha para el form
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	console.log(fecha);
	$('#txtFecha').val(fecha);//le asifnamos el valor a l input 
});
/*Efectos */
	setInterval(// creamos un timer el cual va a ejecutar una funcion asincrona para dar el efectos
		function() {
			apacidadMas();//aumenta la opacidad del componente
			apacidadMenos();//Disminuyel la opacidad del componente
		}, 4000);//Estas funciones se van a estar ejecutanda cada 4 segunndos

	function apacidadMas() {//disminuimos la opacidad del componente
		$('.brillo').animate({// creamos una animacion para la clase brillo
			'opacity': '0.05'//aumentamos a opacidad en un 5%
		}, "slow");//el efecto que va a tener
	}
	function apacidadMenos() {//auemtamos la opacidad del componente
		$('.brillo').animate({//creamos la animacion
			'opacity': '1'// aumentamos la opacidad al 100%
		}, "slow");//el efecto que va ha tener
	}
	function eliminarEfecto(id) {//Obtnermos el id del input y eliminamos el efecto
		//console.log($(id).attr('id'));
		//capturamos el efecto y eliminamos la clase
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
function validarCodigoPostal(cp) {// esta funcion valida el codigo postal
	var id=$(cp).attr('id');//capturamos el id
	var iddiv='valCp';//esta variable es para validar el input en esta se escrive id del div
	var valor = cp.value;//obtenemos el valor del input
	$('#txtCp').val();
	//Si el valor no es vacio y el valor esta entre 1000 y 999999 entrara 
	if (valor.length == 5 && parseInt(valor) >= 1000 && parseInt(valor) <= 99999) {
		validarinputs(true,id,iddiv,'Muy Bien');//mandara un true el id del intup del div y un mensaje
	}
	else {//Sino mandara un false el id del input y de div y un mensaje de error
		validarinputs(false,id,iddiv,'ERROR, POR FAVOR INGRESE SU CÓDIGO POSTAL VALIDO');
	}
}
function ValidarNombre(text) {// En esta funcion solo vamos a validar el nombre
	var id = $(text).attr('id');// obntnemos el id del input
	var iddiv ='valNombre';//Capturamos el id del div del componente
	if (text.value === null || text.value.length >= 3 && text.value.length<=20) {//Si el valor no esta vacio pasa este if
		validarinputs(true, id, iddiv, 'Muy Bien');// llama la funcion validarinouts le pasa un true el id del input y el id del div y un mensaje
	}
	else {//Si la condicion no se cumple llamamos la funcion pero con un error
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
		validarinputs(false, id, iddiv, 'ERROR, POR FAVOR INGRESE SU EDAD CORRECTA <b> (DEBE DE SER MAYOR A LOS 18 AÑOS)</b>.');
	}
}
function validarinputs(bandera,idInp,iddiv,mens) {/*Esta funcion Es muy importante ya que con ella hacemos 
	que los inputs manden un error */
	console.log(bandera, idInp,iddiv);
	$('#' + iddiv).empty();//Obtnemos el id del div 
	if (bandera) {//Preguntamos si el componente es valido 
		//Al input le removemos la clase invlida y se la cambiamos por valida
		$("#" + idInp).removeClass('is-invalid').addClass('is-valid');
		//Al div que se encuantra debajo del div le quitamos la clase invalida y le agregamos valido,
		//Tambien agregamos un h6 en el cual mostraremos el mensaje que resivamos de las validaciones
		$('#' + iddiv).removeClass('invalid-feedback').addClass('valid-feedback').append('<h6>'+mens+'</h6>');
		} else {//en caso de que la validacion se falsa
		//Al input le quitamos la clase valida y le agregamos la clase invalida
		$('#' + idInp).removeClass('is-valid').addClass('is-invalid');
		//Al div que se encuantra debajo del div le quitamos la clase valida y le agregamos invalido,
		//Tambien agregamos un h6 en el cual mostraremos el mensaje que resivamos de las validaciones
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

function enviarDatos(){
	Swal.fire(
		'Muy Bien!',
		'Gracias por reportar!',
		'success'
	)
  }
