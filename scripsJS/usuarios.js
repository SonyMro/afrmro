$(document).ready(function () {
	listarUsuarios();//cargamos en lista todos los usuario 
//	$('#ModalEditUser').modal('show');
	});

//crud
function listarUsuarios() {// Esta funcion sirve para haver la peticion post para ver la lista de usuarios
	console.log('tbal');
	var base_url = window.location.origin;// Esta varible nos sirve para obtener la ip junto con el puerto la cual ocuparemos
	//mas adelante para no poner la ip y asi la ip puede ser dinamica y nos dara errores
	$.ajax({//Realizamos la peticion post por ajax en este caso apuntamos al controllerUser con el metodo show
		url: base_url + '/sc/index.php/cllUser/show',//la url junto al controller y el metodo
		type: 'POST',//El tipo de peticion en este caso es la POST
		contentType: "application/json; charset=utf-8;",//El tipo de contenido es este caso es Json
		dataType: "json",//el tipo de dato que nos va debolver en este caso es Json
		success: function (result) {//Si la peticion es un exito se ejecutara el success el cual ejecutara una funcion asincrona 
			//y como parametro resivira el la respuesta del servidor
			$('#tblUsuers').empty();//Limpiamos la tabla 
			var tabla = '';//Declaramos una variable par concatenar el contenido de la tabla
			for (let i = 0; i < result.length; i++) {//recorremos el result
				tabla += '<tr>' +//Abrimos una fila
					'<td>' + result[i].IdUsuario + '</td>' +//creamos las columnas
					'<td>' + result[i].Nombre + '</td>' +
					'<td> ' + result[i].Apepat +' '+result[i].Apemat + '</td>' +
					'<td> ' + result[i].mail + '</td>' +
					'<td>' + result[i].Gerencia  + '</td>' +
					'<td>' + result[i].RolUser + '</td>' + //creamos una columna auxiliar en la cual podremos editar la informacion del usuario
					'<td> <button onclick="verDetalles(this)" class="btn btn-info" id=' + result[i].IdUsuario+'>Ver detalles</button>' + '</td>' +						
					'</tr>';
			}
			$('#tblUsuers').append(tabla);//creamos la tabla todos los usuarios
			//$("#cat").append(cadena);
			console.log(result)
		},
		error: function (xhr, textStatus, errorMessage) {// si la peticion falla imprimira un error
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}
function verDetalles (event) {//En esta funcion obtenemos los detalles del usuario seleciona el event el Objet de la fila seleccionada
//Con la fila de la tabla usuarios es un arreglo se accede a el como en un arreglo normal 
	var id = $(event).attr('id');//con al attr obtnemos el id
	console.log(id);	
	var vId = $('#' + id).parents('tr').find('td')[0].innerHTML;//la primera columan tien el id del usuario
	$('#MtxtId').val(vId); // le asignamos al input el valor obtenido por la columna 1
	var vNombre = $('#' + id).parents('tr').find('td')[1].innerHTML;//la segunda columna contiene el nombre 
	$('#MtxtNombre').val(vNombre);// le asignamos al input el valor obtenido por la columna 2
	var ape = $('#' + id).parents('tr').find('td')[2].innerHTML;//La tercera columna tiene los apellidos por lo que hay que partir la cadena
	var apes= ape.split(' ');// con el split partimos la cadena en dos esto nos devuelve un arreglo de dos elementos
	console.log(apes);
	$('#MtxtApepat').val(apes[1]);//Le asignamos el primer elemento a input Apepat
	$('#MtxtApemat').val(apes[2]);//Le asignamos el sugundo elemento al input Apemat
	var vCorreo = $('#' + id).parents('tr').find('td')[3].innerHTML;//obtenemos el ultimos valor de la fila
	$('#MtxtMail').val(vCorreo);//Le asignamos el valor al input
	$('#ModalEditUser').modal('show');//Mostramos el modal
}

function validarForm(event) {//valida el form 
	var ban= confirm('Deseas a');// Preguntamos si se desea hacer la peticion
	if (ban) {//si es si 
		event.preventDefault();//conselamos la peticion post
	} else {//si es asi imprimimos en consola lo siguiente
		console.log('Canselado');
	}
}
$('#formEdit').submit(function (ev) {//Obtenemos el id de nuestro form y creamos el evento del submit hacemos que ejecute
	//una funcion asincrona la cual va tener compo parametro ev
	var ban = confirm('¿Deseas actualizar la información de este usuario?');//Preguntamos al usuario si desea hacer la peticion POST
	var slg = $('#Mslgerencias').val();//obtnermos el valor del input
	var slr = $('#MslRol').val();//obtnemos el valor del input
	console.log(slg+' rol: '+slr);
	if (ban && slr.length!=0 && slg.length!=0) {//si ban es true si los inputs no estan vacios entrara a esta funcion
		console.log('Canselado');
	} else {//Si no es asi La peticion post se cancelara
		ev.preventDefault();//El preventDefault nos sirve para cancelar la peticion post lo que desimos con el esque queremos
		//que se ejecute una algo en lugar de la peticon post
	}
	
	//later you decide you want to submit
	//$(this).unbind('submit').submit() action="<?php echo site_url('/cllUser/EditUser'); ?>"
});
function verPass() {
	
}
function mostrarPassword() {//Con esta funcion podremos ver la contraseña que estamos ingresando al cliqueal el ojo que se encuentra 
	//en el input password
	var cambio = document.getElementById("txtPass");//Se obtine el object 
	if (cambio.type == "password") {//si el object es de tipo password entra
		cambio.type = "text";//cambia el input de password a text
		$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');//La ojo le pone un a raya indicando que muestra la contraseña
	} else {// sino
		cambio.type = "password";//cambia el input de text a input 
		$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');//El ojo se muestra normal
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
