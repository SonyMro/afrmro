$(document).ready(function () {
	$('#sec-2').hide();
	var f = new Date();
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	console.log(fecha);
	$('#txtFecha').val(fecha);
	//alert();
//	$('#modalCargando').modal({ backdrop: 'static', keyboard: false })
});
/* Eventos*/
function BuscarReserva() {

	var verif = validarFolio();
	console.log(verif);
	var folio = $('#txtReservacion').val();
	if (verif) {
		consultarReservacion();
		$('#sec-2').show('slow');
		$('#sec-1').hide('slow');
	} else {
		console.log('Error en el folio');
	}
}
function noReser() {
	$('#txtReservacion').val('');
	$('#txtConvoy').val('');
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
function consultarReservacion() {
	var base_url = window.location.origin;
	var folio = $('#txtReservacion').val();
	$('#valfolio').empty();
	if (folio.length>0) {			
	$.ajax({
		url: base_url + '/microws/prueba.php?folio=' + folio,
		type: 'POST',
		success: function (result) {
			var respuesta = JSON.parse(result);
			console.log(respuesta.status);
			if (respuesta.status=='ok') {
				$('#txtRef').val(respuesta.result.id);
				$('#txtRespon').val(respuesta.result.responsable);
				$('#txtGrup').val(respuesta.result.instGrupo);
				$('#txtMail').val(respuesta.result.mail);
				$('#txtAdult').val(respuesta.result.NumAdultos);
				$('#txtNinios').val(respuesta.result.NumBoys);
				$('#txtServ').val(respuesta.result.servicios);
				$('#txtTel').val(respuesta.result.telefono);
				$('#sec-2').show('slow');
				$('#sec-1').hide('slow');
			} else {
				$("#txtReservacion").removeClass('is-valid').addClass('is-invalid');
				$('#valfolio').removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>Verifique que su reservación este correcta. </h6>');
			}			
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
	} else {
		$("#txtReservacion").removeClass('is-valid').addClass('is-invalid');
		$('#valfolio').removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>Verifique que su reservación este correcta. </h6>');
	}
}


