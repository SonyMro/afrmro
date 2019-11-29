$(document).ready(function () {
	$('#sec-2').hide();
	var f = new Date();
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	console.log(fecha);
	$('#txtFecha').val(fecha);
});

/* Eventos*/
function BuscarReserva() {
	//console.log();
	var verif = validarFolio();
	console.log(verif);
	var folio = $('#txtReservacion').val();
	if (verif) {
		consultarReservacion(folio);
		$('#sec-2').show('slow');
		$('#sec-1').hide('slow');
	} else {
		console.log('Error en el folio');
	}
}
function noReser() {
	$('#sec-2').hide('slow');
	$('#sec-1').show('slow');
}
function validarFolio() {
	//var idReser = eval.getAttribute('id');
	var id = $('#txtReservacion').val();
	//var auxban=false;
	//console.log(idReser);
	$('#valfolio').empty();
	if (id.length > 0) {
		$("#txtReservacion").removeClass('is-invalid').addClass('is-valid');
		$('#valfolio').removeClass('invalid-feedback').addClass('valid-feedback').append('<h6>Muy Bien<br> PulsE otra vEz El botón buscar </h6>');
		return true
	} else {
		$("#txtReservacion").removeClass('is-valid').addClass('is-invalid');
		$('#valfolio').removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>Verifique que su reservación este correcta. </h6>');
		return false;
	}
}
function consultarReservacion(folio) {
	var base_url = window.location.origin;
	$.ajax({
		url: base_url + '/microws/prueba.php?folio=' + folio,
		type: 'POST',
		success: function (result) {
			var respuesta = JSON.parse(result);
			console.log(respuesta);
			$('#txtRef').val(respuesta.result.id);
			$('#txtRespon').val(respuesta.result.responsable);
			$('#txtGrup').val(respuesta.result.instGrupo);
			$('#txtMail').val(respuesta.result.mail);
			$('#txtAdult').val(respuesta.result.NumAdultos);
			$('#txtNinios').val(respuesta.result.NumNiños);
			$('#txtServ').val(respuesta.result.servicios);
			$('#txtTel').val(respuesta.result.telefono);
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}

