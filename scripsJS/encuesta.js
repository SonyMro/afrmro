
$(document).ready(function () {
	$('.aumenta').show('slow');
	$('#sec-2').hide();

});


function subPreguntasLikert(caja, sub, id) {
	var valor = parseInt($(caja).val());
	//console.log(sub);
	console.log('hi');
	if (sub != null && sub.length > 0) {
		if (valor != 5) {
			console.log('caja');
			console.log(id);
			var b = parseInt(id);
			$('#div' + id).empty();
			$('#div' + id).append('<div class="form-group"> <h5>' + sub + '</h5>' +
				'<input type="text" class="form-control" name="sub' + id + '" ><br/>'
				+ '<input type="text" style="display: none;" name="Idpregunta' + id + '" value="' + id + '"> </div>');
		} else {
			$('#div' + id).empty();
		}
	} else {
		console.log('no caja');
	}
}
function eliminarEfecto(event) {
	$("#" + $(event).attr('id')).removeClass('brillo');
}
function getFormData(formId) {
	//	console.log($('#'+formId).serializeArray());
	var datos = $('#' + formId).serializeArray();
	var iteraciones = (datos.length / 2);
	console.log(datos);
	console.log(iteraciones);
	if ((datos.length%2)==0) {
		///console.log(datos[0].value);
		//insertar(datos[0 * 2].value, datos[(0 * 2) + 1].value);
		for (let i = 0; i < iteraciones; i++) {
			//console.log('Res: ' + datos[i * 2].value + ' IdPre: ' + datos[(i * 2) + 1].value);
			insertar(datos[i * 2].value, datos[(i * 2) + 1].value);
		}
	} else {
		console.log('inpar');
	}
}
function insertar(respuesta, idPregunta) {
	var f = new Date();
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	var idEnc = 1;
	//	console.log(fecha);
	var base_url = window.location.origin;
	console.log(respuesta + ' ' + idPregunta + ' ' + idEnc + ' ' + fecha);
	$.ajax({
		type: "POST",
		url: base_url + '/sc/index.php/cllRespuestas/insertar',
		data: { Resp: respuesta, Pregunta: idPregunta, Enc: idEnc, Fecha:fecha},
		dataType: "JSON",
		success: function (response) {
			console.log(response);
		},
		error: function (params) {
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
