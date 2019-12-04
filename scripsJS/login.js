$(document).ready(function () {
//	console.log("ready!");
});
function validarUsuario(event) {
	if (condition) {

	} else {
		event.preventDefault(); 
	}
}

function verMail(params) {
	console.log(params.value);
	var base_url = window.location.origin;
	$('#txtCorreo').removeClass('is-valid');
	$('#txtCorreo').removeClass('is-invalid');
	$.ajax({
		type: "POST",
		url: base_url+"/sc/index.php/cllUser/buscarMail",
		data: {mail:params.value},
		dataType: "Json",
		success: function (response) {
		console.log(response.status);
		if (response.status=="ok") {
			$('#txtCorreo').addClass('is-valid');
		} else {
			$('#txtCorreo').addClass('is-invalid');
		}
		}
	});
}
var verificarUsuario=false;
function verPass(params) {
	//console.log(params.value);
	var base_url = window.location.origin;
	var correo = $('#txtCorreo').val();
	$('#txtPass').removeClass('is-valid');
	$('#txtPass').removeClass('is-invalid');
	$('#txtCorreo').removeClass('is-valid');
	$.ajax({
		type: "POST",
		url: base_url+"/sc/index.php/cllUser/buscarPass",
		data: { mail:correo,pass: params.value },
		dataType: "Json",
		success: function (response) {
			console.log(response.status);
			if (response.status == "ok") {
				$('#txtPass').addClass('is-valid');
				$('#txtCorreo').addClass('is-valid');
				verificarUsuario=true
			} else {
				$('#txtPass').addClass('is-invalid');
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Error en el correo o contraseña!',
				});
			}
		},
		error: function (err) {
		console.error(err);	
		}
	});
}
function mostrarPassword() {
	var cambio = document.getElementById("txtPass");
	if (cambio.type == "password") {
		cambio.type = "text";
		$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	} else {
		cambio.type = "password";
		$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
}

$("#formlogin").submit(function (e) {

	//e.preventDefault();
	console.log('submit');
	
	if ($("#txtCorreo").hasClass("is-valid")) {
		console.log('si');
		return true;
	} else {
		e.preventDefault();
	}

});
function xhr_get() {
	var base_url = window.location.origin;
	var pw = $('#txtPass').val();
	var correo = $('#txtCorreo').val();
	return $.ajax({
		type: "POST",
		url: base_url + "/sc/index.php/cllUser/buscarPass",
		data: { mail: correo, pass: pw },
		dataType: "Json",
		beforeSend: function () {
			console.log('Cargando..........');
		}
	})
		.always(function (r) {
			console.log('terminado: '+r);
			// Por ejemplo removemos la imagen "cargando..."
		})
		.fail(function (er) {
			console.log('Error en: '+er);
			// Manejar errores
		});

}



xhr_get('/id').done(function (data) {
	// hacer algo con el id de data
});
