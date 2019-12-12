$(document).ready(function () {
	$('#sec-2').hide();//Ocultamos el card de de la informacion del cliente
	var f = new Date();//creamos una nueva fecha
	/*creamos la fecha en la que se esta año mes dia hora minutos y segundos */
	var fecha = f.getFullYear() + '-' + (f.getMonth() + 1) + "-" + f.getDate() + ' ' + f.getHours() + ':' + f.getMinutes() + ':' + f.getSeconds();
	console.log(fecha);
	$('#txtFecha').val(fecha);//Le ponemos como valor a input la fecha que se capturamos
	//alert();
//	$('#modalCargando').modal({ backdrop: 'static', keyboard: false })
});
/* Eventos*/
function BuscarReserva() {/*Buscamos la reservacion*/
	var verif = validarFolio();//Verificamos que los campos no esten vacios
	console.log(verif);
	var folio = $('#txtReservacion').val();//Obtnemos el folio
	if (verif) {//Validamos los resultados
		consultarReservacion();//mandamos a llamar a la funcion de consultar reservacion
		$('#sec-2').show('slow');//Mostramos el card de informacion del cliente
		$('#sec-1').hide('slow');//Ocultamos el card de buscar reservacion
	} else {
		console.log('Error en el folio');
	}
}
function noReser() {
	$('#txtReservacion').val('');//limpiamos el input
	$('#txtConvoy').val('');//limpiamos el input
	$('#sec-2').hide('slow');//Ocultamos el car de Infromacion de reservacion 
	$('#sec-1').show('slow');//Mostramos el car de buscar reservacion
}
function validarFolio() {// validamos que el input no este vacio
	//var idReser = eval.getAttribute('id');
	var id = $('#txtReservacion').val();//Obtenemos el valor del input
	//var auxban=false;
	//console.log(idReser);
	$('#valfolio').empty();//Limppimaos el card de folio
	if (id.length > 0) {//si el folio no esta vacio
		$("#txtReservacion").removeClass('is-invalid').addClass('is-valid');//cambiamos la clase de invalida a valida 
		//en el div esvribimos muy bien
		$('#valfolio').removeClass('invalid-feedback').addClass('valid-feedback').append('<h6>Muy Bien<br> PulsE otra vEz El botón buscar </h6>');
		return true//retornamos un verdadero
	} else {// si el folio no es validos
		$("#txtReservacion").removeClass('is-valid').addClass('is-invalid');//Subrayamos de color rojo 
		//mostramos un mensaje que diga que no se en cunetra la reservacion
		$('#valfolio').removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>Verifique que su reservación este correcta. </h6>');
		return false;// retornamos un falso
	}
}
function consultarReservacion() {// consulatmos la reservacion
	var base_url = window.location.origin;//Obtenemos el la ip y el puerto
	var folio = $('#txtReservacion').val();// obtenemos el folio del cliente 
	$('#valfolio').empty();//limpiamos el input del folio
	if (folio.length>0) {	//verificamos que el folio no este vacio		
	$.ajax({//Ejecuatoms a la peticion ajax  y en el url le pasamos el folio
		url: base_url + '/microws/prueba.php?folio=' + folio,
		type: 'POST',// Petion de tipo post
		success: function (result) {// si es un exito 
			var respuesta = JSON.parse(result);//Consertimos la cadena en Json
			console.log(respuesta.status);
			if (respuesta.status=='ok') {// si el estado es correocto mostramos la informacion del usuario en el card de informacion
				$('#txtRef').val(respuesta.result.id);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtRespon').val(respuesta.result.responsable);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtGrup').val(respuesta.result.instGrupo);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtMail').val(respuesta.result.mail);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtAdult').val(respuesta.result.NumAdultos);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtNinios').val(respuesta.result.NumBoys);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtServ').val(respuesta.result.servicios);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#txtTel').val(respuesta.result.telefono);//asignamos el valor de la peticion al input para depues almacenarla en la base de datos de la en cuasnta
				$('#sec-2').show('slow');//Mostramos el card de informcion de reservacion
				$('#sec-1').hide('slow');//Cosultamos el card de buscar reservacion
			} else {
				$("#txtReservacion").removeClass('is-valid').addClass('is-invalid');//mostramos que fue un exito
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


