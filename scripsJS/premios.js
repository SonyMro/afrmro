$(document).ready(
	listarPremios()
);
/*Convertir una imagen a base64*/

var imagen='';
function readFile() {
	if (this.files && this.files[0]) {
		var FR = new FileReader();
		FR.addEventListener("load", function (e) {
			document.getElementById("fire").src = e.target.result;
			// document.getElementById("b64").innerHTML = e.target.result;
			imagen = e.target.result;
		
		});
		FR.readAsDataURL(this.files[0]);
	}
}
document.getElementById("file-input").addEventListener("change", readFile);
var ModFoto = "";
function readFileMod() {
	if (this.files && this.files[0]) {
		var FR = new FileReader();
		FR.addEventListener("load", function (e) {
			document.getElementById("img1M").src = e.target.result;
			// document.getElementById("b64").innerHTML = e.target.result;
		
			ModFoto = e.target.result;
		});
		FR.readAsDataURL(this.files[0]);
	}
}
document.getElementById("txtImgM").addEventListener('change', readFileMod);

var toBase64 = function (file, callBack) {
	file = file.files[0];
	var reader = new FileReader();
	reader.readAsDataURL(file);
	reader.onload = function () {
		callBack(file, reader.result);
	};
	reader.onerror = function (error) {
		console.log('Error: ', error);
	};
};
var convertImg='';
var fileEl = $('#txtImg');
$(fileEl).on('change', function () {
	toBase64(this, function (file, base64) {
		//console.log(file);
	   //console.log(base64);
		convertImg += base64;
	});
});
function listarPremios() {
	console.log('tbal');
	var base_url = window.location.origin;
	var tbl='tblPremios'
	$.ajax({
		url: base_url + '/sc/index.php/cllPremios/show',
		type: 'POST',
		contentType: "application/json; charset=utf-8;",
		dataType: "json",
		success: function (result) {
			$('#tblPremios').empty();
			var tabla='';
			for (let i = 0; i < result.length; i++) {
				tabla+='<tr>'+
				'<td>' +result[i].IdPremio+'</td>'+
				'<td>' + result[i].Nombre + '</td>' +
					'<td> <img src="' + result[i].foto + '" alt="" width="100" height="100">' + '</img></td>' +
					'<td>' + result[i].Descripcion + '</td>' +
					'<td><a type="button" class="btn btn-warning" id="' + result[i].IdPremio+'" onclick="edit(this)" data-toggle="modal" data-target="#modEdit">Ver Detalles</a></td>' +
					
				'</tr>';				
			}
			$('#tblPremios').append(tabla);
			//$("#cat").append(cadena);
			console.log(result)
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}

function insertar() {
	console.log(imagen);

    var base_url = window.location.origin;
	var nombre = $('#txtNombre').val();
	var descrip = $('#txtDes').val();
	if (nombre.length>0 && descrip.length >0 ) {
		//console.log(dat);
		$.ajax({
			url: base_url + '/sc/index.php/cllPremios/save',
			type: 'POST',
			data: { Nombre: nombre, img: imagen, des: descrip},
			success: function (result) {
			//	console.log(result)
				imagen = '';
				listarPremios();
				swal('El premio ha sido agregado correctamente.');	
			},
			error: function (xhr, textStatus, errorMessage) {
				console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
			}
		});/**/
	//	swal('Muy bien.','El premio se ha registrado correctamente.','success');
		//$(location).prop('href', base_url +'/sc/index.php/cllPremios');
		//location.reload();
		
		$('#txtNombre').val('');
		$('#txtDes').val('');
		$('#txtStock').val('');
		
	} else {
		//Swal.fire('¡Error!','Faltan campos por llenar verifica a que todos <b>los campos  no estén vacíos</b>');
	}
	
}

function edit(id) {
	var base_url = window.location.origin;
	var idP= $(id).attr('id');
	//console.log(idP);
	$.ajax({
		// Esto no puedes hacerlo, este es un array con los parámetros de la petición AJAX 
		dataType: 'json',
		type: "post",
		url: base_url +'/sc/index.php/cllPremios/edit/'+idP,
		success: function (data) {
			//console.log(data[0].IdPremio);
			//console.log(data);
			cargarPremios(data[0]);
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});
}

function cargarPremios(params) {
	console.log(params.IdPremio);
	$('#txtIdM').val(params.IdPremio);
	$('#txtNombreM').val(params.Nombre);
	$('#txtDesM').val(params.Descripcion);
	$('#txtStockM').val(params.Stock);
	$("#img1M").attr("src", params.foto);
	//$('#modEdit').modal('show');
	ModFoto = params.foto;
}

function modificar() {
	var base_url = window.location.origin;
	var id=$('#txtIdM').val();
	var nom=$('#txtNombreM').val();
	var desc=$('#txtDesM').val();
	var stock=$('#txtStockM').val();
	var desicion = confirm('Deseas actualizar este Premio.');
	//console.log(convertImgM);
	if (desicion) {
		
	$.ajax({
		url: base_url + '/sc/index.php/cllPremios/modificar',
		type: 'POST',
		data: { Id: id ,Nombre: nom, img: ModFoto, des: desc, Stock: stock },
		success: function (result) {
			console.log(result)
			ModFoto='';
			Swal.fire('Muy bien.', 'El premio se ha modificado correctamente.', 'success');
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
		listarPremios();
} else {
		swal('La actualización ha sido Cancelada correctamente.');	
	}
}
function Eliminar() {
	var base_url = window.location.origin;
	var idp = $('#txtIdM').val();
	var desicion= confirm('Deseas Eliminar este premio');
	if (desicion) {
	$.ajax({
		// Esto no puedes hacerlo, este es un array con los parámetros de la petición AJAX 
		dataType: 'json',
		type: "post",
		url: base_url + '/sc/index.php/cllPremios/eliminar/' + idp,
		success: function (data) {
			Swal.fire('Muy bien.', 'El premio se ha Eliminado correctamente.', 'success');
		console.log(data);
		},
		error: function (xhr) {
			console.log("ERROR");
		}
	});
		listarPremios();	
} else {
		alert('Conselado');
	}
	
}
