
	$(document).ready(function() {
		$('#ReSerEduSi').hide();
	$('#comp2s').hide();
	$('#comp3n').hide();
	$('#subcomp1s').hide();
	$('#subsubcomp1s').hide();
	$('#cardInfo').hide();
	$('#comp4s').hide();
	$('#guia').hide();
	$('#comp5').hide();
	$('#busContratado').hide();
	$('#servicioEducativo').hide();
	$('#alimentosContratados').hide();
	$('#comp6').hide();
	$('.aumenta').show('slow');
});
	$('#btnc1rs1').click(function() {
		$('#comp1s').fadeOut('slow');
	$('#comp2s').fadeIn('slow');
});
	$('#btnc1rn1').click(function() {
		$('#comp1s').fadeOut('slow');
	$('#comp3n').fadeIn('slow');
	//alert('hi');
});
	$('#rdop2s').click(function() {
		$('#subsubcomp1s').fadeIn('slow');
});
	$('#rdop2n').click(function() {
		$('#subsubcomp1s').fadeOut('slow');
});
	$('#btnBuscarReserv').click(function(event) {
		$('#subcomp1s').fadeIn('slow');
	$('#compBuscar').hide(1000);
	$('#cardInfo').show('slow');
});
	$('#btnenv1c2ss1').click(function() {
		//alert('si');
		$('#comp2s').hide(2000);
	$('#comp4s').show('slow');
});

	function Guias(event) {
		var valorGuia = $(event).attr('value');
		if (valorGuia == 'guia' || valorGuia == 'operador guia') {
		$('#guia').show('slow');
		} else {
		alert('no');
}
}

	function noreservacion(ev) {
		//var valorGuia = $(ev).attr('value');
		var clase = $(ev).attr('class');
	console.log(clase);
	var seleccion = $('.noReservacion').prop('checked');
	var seleccion2 = $('.noReservacionNinguno').prop('checked');
	var bandera = true;
	//console.log(seleccion);
		if (seleccion) {
		$('.noReservacion').prop("disabled", false);
	$('.noReservacionNinguno').prop("disabled", true);
		} else {
		$('.noReservacionNinguno').prop("disabled", false);
}

		if (seleccion2) {
		$('.noReservacion').prop("disabled", true);
	$('.noReservacionNinguno').prop("disabled", false);
		} else {
		$('.noReservacion').prop("disabled", false);
}
}

	$('#btnenv1c4s').click(function() {
		$('#comp4s').hide('slow');
	$('#guia').hide(1000);
	$('#comp5').show('slow');
});
var banderaBuscantratado = true;
	$("#btnBusContratado").click(function() {
		var uno = document.getElementById('btnBusContratado');
		if (banderaBuscantratado || uno.innerText == 'Autobús contratado. ▼') {
		$('#busContratado').show('slow');
	uno.innerText = 'Autobús contratado. ▲';
	banderaBuscantratado = false;
		} else {
		$('#busContratado').hide('slow');
	uno.innerText = 'Autobús contratado. ▼';
	banderaBuscantratado = true;
}
});
var banderaservicioEducativo = true;
	$("#btnservicioEducativo").click(function() {
		//	alert('hi');
		var uno = document.getElementById('btnservicioEducativo');
		if (banderaservicioEducativo || uno.innerText == 'Servicio Educativo. ▼') {
		$('#servicioEducativo').show('slow');
	uno.innerText = 'Servicio Educativo. ▲';
	banderaservicioEducativo = false;
		} else {
		$('#servicioEducativo').hide('slow');
	uno.innerText = 'Servicio Educativo. ▼';
	banderaservicioEducativo = true;
}
});
var banderaalimentosContratados = true;
	$("#btnalimentosContratados").click(function() {
		//	alert('hi');
		var uno = document.getElementById('btnalimentosContratados');
		if (banderaalimentosContratados || uno.innerText == 'Alimentos Contratados. ▼') {
		$('#alimentosContratados').show('slow');
	uno.innerText = 'Alimentos Contratados. ▲';
	banderaalimentosContratados = false;
		} else {
		$('#alimentosContratados').hide('slow');
	uno.innerText = 'Alimentos Contratados. ▼';
	banderaalimentosContratados = true;
}
});
	$('#btnenv1c5s').click(function() {
		$('#comp5').hide(1000);
	$('#comp6').show('slow');
});

	function ReSerEdu(event) {
		var idreseervacion = $(event).attr('value');
		if (idreseervacion == 'si') {
		$('#ReSerEduSi').show('slow');
		} else {
		console.log('no');
}
}
var cont = 1;
	$('#btnTemas').click(function() {

		$('#temasEduAgregados').append('<div class="eliminarTema' + cont + '"><br/><input type="button" class="btn btn-outline-success pt-2" style="width:100%; word-wrap: break-word;" value="' +
			$('#txtTemaAdd').val() + '"/><button class="btn btn-danger"  onClick="cancelarTema(this)" id="' + cont + '">X</button><br/></div>');
$('#txtTemaAdd').val('');
cont++;
});

	function cancelarTema(ev) {
		var ValorTema = $(ev).attr('value');
	var idTema = $(ev).attr('id');
	console.log(idTema);
	var eli = 'eliminarTema' + idTema;
	$('.eliminarTema' + idTema).remove();

}
	/*setInterval(function () {
		incrementa();
 },3000);
*/