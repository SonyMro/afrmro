$(document).ready(
	listarUsuarios()
);

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
					'<td>' + result[i].Nombre  + '</td>' +
					'<td>' + result[i].RolUser + '</td>' +					
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
