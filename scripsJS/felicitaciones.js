$(document).ready(function () {

});
/*Efectos */
setInterval(
	function () {
		apacidadMas2();
		apacidadMenos2();
	}, 3000);

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
setInterval(
	function () {
		apacidadMas();
		apacidadMenos();
	}, 5000);

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
/*Validaciones*/
function validarCampo(params) {
	$('#val').empty();
	//var mens='HHHHHHHHHHHHHHHHHH'
	//$('#val').append('<h6>' + mens + '</h6>')
	
	if (params != '' || params.length !=0) {
	$("#txthappy").removeClass('is-invalid').addClass('is-valid');
		$('#val').removeClass('invalid-feedback').addClass('valid-feedback').append('<h6>MUY BIEN</h6>');
		
	} else {
		$('#txthappy').removeClass('is-valid').addClass('is-invalid');
		$('#val').removeClass('valid-feedback').addClass('invalid-feedback').append('<h6>POR FAVOR INGRESE SU FELICITACIÓN</h6>');
	}

}
