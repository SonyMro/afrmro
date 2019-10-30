$(document).ready(
	
	
);
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
var fileEl = $('input[type=file]');
$(fileEl).on('change', function () {
	toBase64(this, function (file, base64) {
		//console.log(file);
	   //console.log(base64);
		convertImg += base64;
	});
});

function insertar() {
	console.log('hola ');
	console.log('Covertidididjndjd: ' + convertImg);
	var cb = $('#txtImg').val();
var base_url = window.location.origin;
	var nombre = $('#txtNombre').val();
	var foto = $('#txtImg').val(); 
	var descrip = $('#txtDes').val();
	var stock = $('#txtStock').val();
	//console.log(nombre+' '+foto+' '+descrip+stock);
//console.log('insertar: '+base_url);
/*	$.ajax({
		url: base_url + '/sc/index.php/cllPremios/save',
		type: 'POST', 
		data: { Nombre: 'mario', img:'',des:'EL mas mejor', Stock: 10 },
		 success: function (result) {
			console.log(result)
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});*/

}
function getBase64Image(img) {
	var canvas = document.createElement("canvas");
	canvas.width = img.width;
	canvas.height = img.height;
	var ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0);
	var dataURL = canvas.toDataURL("image/png");
	return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
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

function insert() {
	var base_url = window.location.origin;
	// "http://stackoverflow.com"
	var host = window.location.host;
	// stackoverflow.com
	var pathArray = window.location.pathname.split('/');
	console.log(base_url);
	$.ajax({
		// Esto no puedes hacerlo, este es un array con los parámetros de la petición AJAX 
		dataType: 'json',
		type: "post",
		url: base_url +'/sc/index.php/cllPremios/edit/4',
		success: function (data) {
			//console.log(data[0].IdPremio);
			console.log(data);
		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/*
	$.ajax({
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
}
