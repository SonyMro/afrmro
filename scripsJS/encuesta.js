$(document).ready(function () {
	$('.aumenta').show('slow');
	$('#sec-2').hide();

});
//Esta funcion de ejecuta despues de que se la da click al componente
function subPreguntasLikert(caja, sub, id) {//En esta funcion agregaremos la subpreguntas de cada pregunta como 
	//parametro le pasamos el input la subpregunta y el id del input
	var valor = parseInt($(caja).val());//Convertimos el id en entero 
	console.log(sub.length);
	console.log('hi ' + valor);
	if (sub != null && sub.length >0) {//Preguntamos si la pregunta no tiene subpregunta
		if (valor != 5) {//En esta caso solo atendera las preguntas de tipo likert si el valor es diferende de 5 
			//Agregara un input con los atributos de la subpregunta
			console.log('caja');
			console.log(id);
			var b = parseInt(id);
			$('#div' + id).empty();//Limpiamos el div para que no se dupliquen las subpreguntas
			//Con al append creamos un  div dentro de el ponemos un h5 en el cual tendra el titulo de la subpregunta
			//tambien ponemos un input para capturar la respuesta y un input oculto para poder saber a pregunta corresponde
			$('#div' + id).append('<div class="form-group"> <h5>' + sub + '</h5>' +
				'<input type="text" class="form-control is-invalid inputFont" name="sub' + id + '" ><br/>'
				+ '<input type="text" style="display: none;" name="Idpregunta' + id + '" value="' + id + '"> </div>');
		} else {//sino se cunple le candicion limpiamos el div
			$('#div' + id).empty();
		}
	} else {
		console.log('no caja');
	}
}
//Esta funcion se ejecuta cuando se la click a una pregunta
function subPreguntasSiNo(caja, sub, id) {//En esta funcion agregaremos la subpreguntas de cada pregunta como 
	//parametro le pasamos el input la subpregunta y el id del input
	var valor = $(caja).val();//Obtnemos el valor del input
	console.log(valor);
	console.log(sub.length);
	console.log('Sino ' + valor);
	if (sub != null && sub.length > 0) {//verificamos que el valor no se vacio
		if (valor !='si') {
			console.log('caja');
			console.log(id);
			var b = parseInt(id);
			$('#div' + id).empty();//Limpiamos el div para que no se dupliquen las subpreguntas
			//Con al append creamos un  div dentro de el ponemos un h5 en el cual tendra el titulo de la subpregunta
			//tambien ponemos un input para capturar la respuesta y un input oculto para poder saber a pregunta corresponde
			$('#div' + id).append('<div class="form-group"> <h5>' + sub + '</h5>' +
				'<input type="text" class="form-control is-invalid inputFont" name="sub' + id + '" id="2lbl'+id+'"  onblur="validarCajasTexto(this)"><br/>'
				+ '<input type="text" style="display: none;" name="Idpregunta' + id + '" value="' + id + '"> </div>');
		} else {//sino se cunple le candicion limpiamos el div
			$('#div' + id).empty();
		}
	} else {
		console.log('no caja');
	}
}
function eliminarEfecto(event) {//Eliminamos el efecto de parpadeo de las preguntas que ya esten contestadas
	//con el attr obtnemos el id del componente y eliminamos la  clase que los hace parpadear
	$("#" + $(event).attr('id')).removeClass('brillo');
}
function validarCajasTexto(eval) {//Esta fucnion es para validar las cajas de texto recibi el input
	//con el attr obtnemos el id del componente y eliminamos la  clase valid
	$("#" + $(eval).attr('id')).removeClass('is-invalid');
	//Obtnemos el valor del input 
	var texto = $("#" + $(eval).attr('id')).val();
//	console.log(texto);
	if (texto.length>0) {//preguntamos su el valor esta vacio
		//Capturamos el id del input  y elimnamos la calse invalida agregamos al clase valid
		$("#" + $(eval).attr('id')).removeClass('is-invalid').addClass('is-valid');
	}else{//Si el valor esta vacio agregamos la clase invalida
		$("#" + $(eval).attr('id')).addClass('is-invalid');
	}

}
function getFormData(formId) {//Esta funcion es muy importante ya obtenemos el valor de todos los inputs
	//	console.log($('#'+formId).serializeArray());
	var base_url = window.location.origin;//Caputramos la ip y el puerto de la url
	var datos = $('#' + formId).serializeArray();//con el sealizeArray capturamos el valor de todos lo input del 
	//formulario y lo alamacenamos en un arreglo 
	var iteraciones = (datos.length / 2);//como las preguntas son el doble de la que se tienen que almacenamos en base de dato hay
	//que obtner la mitad del arreglo para poder almacenarlo de manera correcta
	console.log(datos);
	console.log(iteraciones);
	var inputs=verificarInputs();//mandamos llamr al funcion que verifica que los inputs no esten vacios
	console.log('Hay vacios: '+inputs);
	var idEnc = $('#txtIdEncuestas').val();//Caputramos el id del encuastado
	console.log(idEnc);
	if ((datos.length%2)==0 && inputs==true) {//preguntamos que el arreglo en su propieda lenth sea par si es asi todas la preguntas 
		//fueron contestadas correctamente
		///console.log(datos[0].value);
		//insertar(datos[0 * 2].value, datos[(0 * 2) + 1].value);
		$('#modalCargando').modal('show');//Mostramos un modal para que bloque la pagina mientras las preguntas se alamacenan en la base de datos
		for (let i = 0; i < iteraciones; i++) {//empesamos a alamcenar las preguntas como son varias utlizamos un ciclo para que se almacenen una por una
			//console.log('Res: ' + datos[i * 2].value + ' IdPre: ' + datos[(i * 2) + 1].value);
			//Llamamos la funcion insertar y le pasamos como parametro el valor del 1 input y el del 2 input 
			insertar(datos[i * 2].value, datos[(i * 2) + 1].value);
			
		} setTimeout(function () {//Hacemos que la pagina muestre un alerta de cargando por 7 segundos
			$('#modalCargando').modal('hide');//Ocultamos el modal de cargando
			console.log('Probando intercambio ');
		location.href = base_url + "/sc/index.php/home/game";//Rediccionamos a la pagina del juego
		}, 7000);//7000 es igual a 7 segundos

	} else {//Si esntra aqui esque faltan contestar preguntas
		console.log('inpar');
		Swal.fire(
			'Upps',
			'Parece que faltan preguntas por responder.',
			'question'
		);
	}
}
function insertar(respuesta, idPregunta) {//esta funcion se encarga de almacenar todas las respuestas y el id de las preguntas en la db
	var f = new Date();//cremos una fecha
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	//Obtnemos el i del encuestado
	var idEnc = $('#txtIdEncuestas').val();
	//	console.log(fecha);
	var base_url = window.location.origin;//capturamos el id y el puerto de la url
	console.log(respuesta + ' ' + idPregunta + ' ' + idEnc + ' ' + fecha);
	$.ajax({
		type: "POST",//Tipo Post 
		url: base_url + '/sc/index.php/cllRespuestas/insertar',
		//mandamos la peticion con la respuesta, id de la pregunta, id del encuestado y la fecha
		data: { Resp: respuesta, Pregunta: idPregunta, Enc: idEnc, Fecha:fecha},
		dataType: "JSON",//De tipo Json 
		success: function (response) {//si la insercion se realizo correctamente
			console.log(response);
		},
		error: function (params) {//hubo fallas en la insercioncion solo mandamos por consola
			console.log(params);
		}
	});/**/
}
setInterval(
	function () {
		apacidadMas2();
		apacidadMenos2();
	}, 2000);

function apacidadMas2() {
	$('.brillo').animate({
		'opacity': '0.05'
	}, "slow");
}

function apacidadMenos2() {
	$('.brillo').animate({
		'opacity': '1'
	}, "slow");
}
/*
function getFormData() {
	var config={};
	$('input').each(function () {
		config[this.name]=this.value;
	});
	console.log(config);
}*/
function selecionarRadio(event) {
	var clase = +$(event).attr('class');
	var id = $(event).attr('id');
	$("input:radio[id='" + id + "']").prop("checked", true);
	$('.' + clase).not(this).prop('checked', false);

}
function boton() {
	console.log('heheh');
	$('#modalCargando').modal('show');
	setTimeout(function () {
		$('#modalCargando').modal('hide');
	}, 4000);
	//	$("#otp_popup").modal("toggle");

}
function verificarInputs(){//Esta funciones para verificar que los inputs no esten vacios
	var rellenados = true;//creamos una variable booleana 
	fi = document.getElementById("form1");//obtnemos el id del form 
	controles = fi.getElementsByTagName('input');//obtnemos todos los inpputs del formulario asi como sus valores y propiedades
	//esto no devolvera un arreglo de inputs
	console.log(controles);
	for (i = 0; i < controles.length; i++) {//recorremos el arreglo de inputs
		control = controles[i];//capoturamos un input del arreglo
		if (control.type == 'text') {//preguntamos si es de tipo text
			if (control.value == "") {//preguntamos si el valor es vacio
				rellenados = false;//a al vraible bolleana le asrinamos un false
			}
		}
	}
	return rellenados;//retormaos la variable
}
