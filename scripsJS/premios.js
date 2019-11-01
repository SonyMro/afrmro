$(document).ready();
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

function insertar() {
console.log('' + convertImg);
    var base_url = window.location.origin;
	var nombre = $('#txtNombre').val();
	var descrip = $('#txtDes').val();
	var stock = $('#txtStock').val();
	if (nombre.length > 0 && descrip.length > 0 && stock.length > 0) {
		$.ajax({
			url: base_url + '/sc/index.php/cllPremios/save',
			type: 'POST',
			data: { Nombre: nombre, img: convertImg, des: descrip, Stock: stock },
			success: function (result) {
				console.log(result)
			},
			error: function (xhr, textStatus, errorMessage) {
				console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
			}
		});/**/
		Swal.fire('Muy bien.','El premio se ha registrado correctamente.','success');
		//$(location).prop('href', base_url +'/sc/index.php/cllPremios');
		//location.reload();
		convertImg = '';
		$('#txtNombre').val('');
		$('#txtDes').val('');
		$('#txtStock').val('');
		
	} else {
		Swal.fire('¡Error!','Faltan campos por llenar verifica a que todos <b>los campos  no estén vacíos</b>');
	}
	//console.log(nombre + ' ' + convertImg+' '+descrip+stock);
//console.log('insertar: '+base_url);
	
}

document.getElementById("txtImg").onchange = function (e) {
	// Creamos el objeto de la clase FileReader
	let reader = new FileReader();
	// Leemos el archivo subido y se lo pasamos a nuestro fileReader
	reader.readAsDataURL(e.target.files[0]);
	// Le decimos que cuando este listo ejecute el código interno
	reader.onload = function () {
		let preview = document.getElementById('preview');
	//	image = document.createElement('img');
		//image.src = reader.result;
	//	preview.innerHTML = '';
		//preview.append(image);
		//preview.append('');
		$("#img1").attr("src", reader.result);
	};
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
	/*$.ajax({
		type: "POST",
		url: '<?php echo site_url("/cllPremios/show"); ?>',
		dataType: "JSON",		
		success: function (respuesta) {
			console.log(respuesta);
		},
		error: function () {
			console.log("No se ha podido obtener la información");
		}
	});*/
}var convertImgM = '';
function cargarPremios(params) {
	console.log(params.IdPremio);
	$('#txtIdM').val(params.IdPremio);
	$('#txtNombreM').val(params.Nombre);
	$('#txtDesM').val(params.Descripcion);
	$('#txtStockM').val(params.Stock);
	$("#img1M").attr("src", params.foto);
	//$('#modEdit').modal('show');
	convertImgM = params.foto;
}

var fileElM = $('#txtImgM');
$(fileElM).on('change', function () {
	toBase64(this, function (file, base64) {
		//console.log(file);
		//console.log(base64);
		convertImgM += base64;
	});
});
document.getElementById("txtImgM").onchange = function (e) {
	// Creamos el objeto de la clase FileReader
	let reader = new FileReader();
	// Leemos el archivo subido y se lo pasamos a nuestro fileReader
	reader.readAsDataURL(e.target.files[0]);
	// Le decimos que cuando este listo ejecute el código interno
	reader.onload = function () {
		let preview = document.getElementById('previewM');
		
		$("#img1M").attr("src", reader.result);
	};
}
function modificar() {
	var base_url = window.location.origin;
	var id=$('#txtIdM').val();
	var nom=$('#txtNombreM').val();
	var desc=$('#txtDesM').val();
	var stock=$('#txtStockM').val();
	$("#img1M").attr("src", convertImgM);
	$.ajax({
		url: base_url + '/sc/index.php/cllPremios/modificar',
		type: 'POST',
		data: { Id: id ,Nombre: nom, img: convertImgM, des: desc, Stock: stock },
		success: function (result) {
			console.log(result)
			Swal.fire('Muy bien.', 'El premio se ha modificado correctamente.', 'success');
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}
function Recargar() {
	location.reload();
}
