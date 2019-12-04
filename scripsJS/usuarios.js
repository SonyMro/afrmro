$(document).ready(function () {
	listarUsuarios();
//	$('#ModalEditUser').modal('show');
	});

//crud
function listarUsuarios() {
	console.log('tbal');
	var base_url = window.location.origin;
	var tbl = 'tblPremios'
	$.ajax({
		url: base_url + '/sc/index.php/cllUser/show',
		type: 'POST',
		contentType: "application/json; charset=utf-8;",
		dataType: "json",
		success: function (result) {
			$('#tblUsuers').empty();
			var tabla = '';
			for (let i = 0; i < result.length; i++) {
				tabla += '<tr>' +
					'<td>' + result[i].IdUsuario + '</td>' +
					'<td>' + result[i].Nombre + '</td>' +
					'<td> ' + result[i].Apepat +' '+result[i].Apemat + '</td>' +
					'<td> ' + result[i].mail + '</td>' +
					'<td>' + result[i].Gerencia  + '</td>' +
					'<td>' + result[i].RolUser + '</td>' +
					'<td> <button onclick="verDetalles(this)" class="btn btn-info" id=' + result[i].IdUsuario+'>Ver detalles</button>' + '</td>' +						
					'</tr>';
			}
			$('#tblUsuers').append(tabla);
			//$("#cat").append(cadena);
			console.log(result)
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}
function verDetalles (event) {

	var id = $(event).attr('id');
	console.log(id);	
	var vId = $('#' + id).parents('tr').find('td')[0].innerHTML;
	$('#MtxtId').val(vId); 
	var vNombre = $('#' + id).parents('tr').find('td')[1].innerHTML;
	$('#MtxtNombre').val(vNombre);
	var ape = $('#' + id).parents('tr').find('td')[2].innerHTML;
	var apes= ape.split(' ');
	console.log(apes);
	$('#MtxtApepat').val(apes[1]);
	$('#MtxtApemat').val(apes[2]);
	var vCorreo = $('#' + id).parents('tr').find('td')[3].innerHTML;
	$('#MtxtMail').val(vCorreo);
	$('#ModalEditUser').modal('show');
}

function validarForm(event) {
	var ban= confirm('Deseas a');
	if (ban) {
		event.preventDefault();
	} else {
		console.log('Canselado');
	}
}
$('#formEdit').submit(function (ev) {
	var ban = confirm('¿Deseas actualizar la información de este usuario?');
	var slg = $('#Mslgerencias').val();
	var slr = $('#MslRol').val();
	console.log(slg+' rol: '+slr);
	if (ban && slr.length!=0 && slg.length!=0) {
		console.log('Canselado');
	} else {		
		ev.preventDefault();
	}
	
	//later you decide you want to submit
	//$(this).unbind('submit').submit() action="<?php echo site_url('/cllUser/EditUser'); ?>"
});
function verPass() {
	
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
function validarPasss() {
	var pass1 = $('#txtPass').val();
	var pass2 = $('#txtPassV').val();
	if (pass1 == pass2) {
		console.log('Muy Bien');
	} else {
		alert('La contraseña no coincide.');
	}
}
