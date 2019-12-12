$(document).ready(function () {  
	listarPreguntas();//cargamos las preguntas al card
});
//Obtenemos el canvas y le asignamos un contexto
let miCanvas = document.getElementById('MiGrafica').getContext('2d');

function Graficar(labels,data) {//Creamos un funcion para que grafique todas las preguntas

	var chart = new Chart(miCanvas, {// Creamos una nueva instancia de la clase chart de la biblioteca ChartJS y le pasamos como parametro el canvas 
		type: 'bar',//Selecinamos el tipo en este caso es de tipo barra
		data: {// creamos el contenido 
			labels:labels,//Asignamos las etiquetas
			datasets: [
				{
					label: "Resultados",//Ponemos una leyenda
					backgroundColor: ["#808b96", "#E59866", "#82e0aa", "#7fb3d5", " #d98880"],//Creamos 5 colores para cada barra
					borderColor: "#f4d03f",//Creamos un borde para las barras
					data: data,//Pasamos las cantidades
				}
			]
		},
		options: {
			scales: {
				xAxes://Eje x
					[{
						ticks:
							{ fontSize: 14 }//aumentamos la fuente 
					}],
				yAxes://Eje y
					[{
						ticks:
							{ fontSize: 14 }//aumentamos la fuente 
					}]
			}
		}
	});	

}

function listarPreguntas() {//Obtenemos las lista de preguntas de la base de datos
	var base_url = window.location.origin;//Capturamos la ip y el puerto de la pagina 
	var idG = $("#lIdg").val();//obtnermos el valor del id de gerencia
	var idU = $("#lId").val();//obtnermos el valor del id del Usuario
	$("#divpre").empty();//Limpiamos el div de las preguntas
	//console.log(idG);
	$.ajax({
		url: base_url + '/sc/index.php/cllPreguntas/buscarPreguntas',//realizamos la peticion Ajax
		type: 'POST', // la peticion es por post 
		data: { idg: idG,idr:idU},//Le enviamos el id de la gerencia y el id del usuario
		success: function (response) {//Si es la peticion es un exito retorna la lista de preguntas que tiene que ver ese usuario
			if (response.status=='ok') {//Verificamos que la respuesta se exitosa
				console.log(response.result.length);
				for (let i = 0; i < response.result.length; i++) {/*Recorremos todas las preguntas y creamos nuestra lista de preguntas*/
					$('#divpre').append('<li class="btn btn-outline-dark" id="' + response.result[i].IdPregunta +'" onclick="getPregunt(this)" value="'+
						response.result[i].tipo + '">' + response.result[i].IdPregunta + '. ' + response.result[i].Pregunta 
						+ '<input id="txtP' + response.result[i].IdPregunta + '" style="display: none;" value="' + response.result[i].tipo+'"></li>');		
				}
			} else {
				console.log(response.status);
			}
			console.log(response.result);
		}
	});
}
function getPregunt(eval) {/*Obtenemos la informacion de la pregunta*/
	$('#cpreg').empty();//limpiamos el titulo del card de la grafica
	 $("#txtDesde").val('');//limpiamos el input de la fecha desde 
	 $("#txtHasta").val('');//limpiamos el input de la fecha hasta
	var id = $(eval).attr('id');//Obtnemos el id de la pregunta
	var preg = $('#' + id).text();//obtenemos el texto de la pregunta
	var idinput = $('#txtP'+id).val();//obtenemos el valor de la pregunta
	miCanvas.clearRect(0, 0, miCanvas.width, miCanvas.height);//limpiamos el area del canvas 
	$('#cpreg').append('<h3>' + preg + // en el titulo del colocamos la pregunta y creamos un input invisiable el cual nos ayudara para asignarle el valor de la pregunta 
		'</h3><input id="Idpregunt" style="display: none;" value="' + id +'"><input id="txtPcard" style="display: none;" value="' + idinput +'">');
		// de crean dos inputs invisibles una es para seber el tipo de pregunta y el otro es para obtener el id de la pregunta
}
function verResultPregunta() {//Esta funcion la utilizaremos para recuperar los  resultados de la pregunta
	console.log('vamos');
	var id = $("#Idpregunt").val();// se obtiene el valor del input invisible del id
	var desde=$("#txtDesde").val();// se obtiene el valor del input  desde
	var hasta=$("#txtHasta").val();// se obtiene el valor del input hasta
	var tipo = $("#txtPcard").val();// se obtiene el valor del input invisible tipo
	var base_url = window.location.origin;// Obtenemos la ip y el puerto 
	console.log(id+' '+desde+' '+hasta+' '+tipo);
/**/
	if (id.length>0 && desde.length>0 &&hasta.length>0) {//verificamos que los inputs no este vacios
		$.ajax({//Hacemos la peticion ajax
			type: "GET",//En este caso la peticion va a ser de tipo get y le pasamos el id de la pregunta desde cuando y hasta cuando
			url: base_url + '/sc/index.php/cllRespuestas/resultados?idp='+id+'&desde='+desde+'&hasta='+hasta,		
			success: function (response) {//Si peticion es un exito
				console.log(response);
				if (response.status=="ok") {//verificamos que el servidor este respondiendo
					switch (tipo) {//verificamos el tipo 
						case "likert":
							likert(response.result);//Apunta a la funcion likert
							break;
						case "abierta":
							abierta(response.result);//Apunta a la funcion abierta
							break;
						case "abiertalarga":
							abiertalarga(response.result);//Apunta a la funcion abierta larga
							break;
						case "sino":
							sino(response.result);//Apunta a la funcion sino
							break;
						case "esperaba":
						esperaba(response.result);//Apunta a la funcion esperaba
						break;
						default:
							//es cae en un erros es por que algun input esta vacio
							alert('Verica que esta haciendo bien la consulta');
							break;
					}
				} else {// si el servidor nos responde imprimira una alerta
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Algo anda mal en el servidor contacte al administrador!',
					})
				}
			
			}
		});	/*Ajax */
	} else {//si no se ha selecionado una pregunta muestra una alerta
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Verifique que hayas seleccionado una pregunta o poner bien la fecha. !',
		})
	}
	
}
function likert(params) {
	var labels = [];// Declaramos un arreglo para las etiquetas de la grafica
	var data=[];// Declaramos un arreglo para las cantidad de la grafica
	var coment=[];// Declaramos un arreglo para los comnetaciones del card de comentarios
//console.log(params);
for (let i = 0; i < params.length; i++) {
	switch (params[i].Respuesta) {//verica la respuesta
		case '5'://si la respuesta es 5
			labels.push(params[i].Respuesta);//almacena el arreglo el elemento de la posicion i
			data.push(parseInt(params[i].cantidad));//almacena el arreglo el elemento de la posicion i
		break;
		case '4'://si la respuesta es 4
			labels.push(params[i].Respuesta);//almacena el arreglo el elemento de la posicion i
			data.push(parseInt(params[i].cantidad));//almacena el arreglo el elemento de la posicion i
			break;
		case '3'://si la respuesta es 3
			labels.push(params[i].Respuesta);//alamanena el arreglo el elemento de la posicion i
			data.push(parseInt(params[i].cantidad));//almacena el arreglo el elemento de la posicion i
		break;
		case '2'://si la respuesta es 2
			labels.push(params[i].Respuesta);//alamanena el arreglo el elemento de la posicion i
			data.push(parseInt(params[i].cantidad));//almacena el arreglo el elemento de la posicion i
			break;
		case '1'://si la respuesta es 1
			labels.push(params[i].Respuesta);//almacena el arreglo el elemento de la posicion i
			data.push(parseInt(params[i].cantidad));//almacena el arreglo el elemento de la posicion i
			break;
		default://Si la respuesta no ninguna de la anteriores es un comentario
			coment.push(params[i].Respuesta, params[i].cantidad);//agrega el comentario a un arreglo 
			break;
	}	
}
console.log('---------------------Arreglo--------------------');
//console.log(labels);
//console.log(data);
	Graficar(labels,data);// mandamos a llamar el la funcion graficar las respuestas de las preguntas 
console.log('---------------------Comentarios--------------------------------');
//console.log(coment);
	getComent(coment);// mandamos a llamar el la funcion getCometen que es donde apareceran los comentarios
}
function abierta(params)//para esta funcion solo se mostraran los comentarios
 {
	var coment=[];//Declaramos un arreglo para los comnetarios
	for (let i = 0; i < params.length; i++) {//reorremos  el arreglo que nos llega como parametro
		coment.push(params[i].Respuesta, params[i].cantidad);// lo almacenamo es el arreglo coment
	}
	//console.log(params);
	getComent(coment);//escribimos los comentarios en el div de comentarios
}
function abiertalarga(params)//para esta funcion solo se mostraran los comentarios
 {
	var coment=[];//Declaramos un arreglo para los comnetarios
	for (let i = 0; i < params.length; i++) {//reorremos  el arreglo que nos llega como parametro
		coment.push(params[i].Respuesta, params[i].cantidad);// lo almacenamo es el arreglo coment
	}
	getComent(coment);//escribimos los comentarios en el div de comentarios
}
function sino(params) {
	console.log(params);
	var labels = [];
	var data = [];
	var coment = [];
	for (let i = 0; i < params.length; i++) {
		switch (params[i].Respuesta) {
			case 'si':
				labels.push(params[i].Respuesta);
				data.push(params[i].cantidad);
				break;
			case 'no':
				labels.push(params[i].Respuesta);
				data.push(params[i].cantidad)
				break;
			default:
				coment.push(params[i].Respuesta, params[i].cantidad);
				break;
		}
	}
	Graficar(labels, data);
	getComent(coment);
}
function esperaba(params) {
	console.log(params);
	var labels = [];
	var data = [];
	var coment = [];
	for (let i = 0; i < params.length; i++) {
		///MEJOR DE LO QUE ESPERABA
		switch (params[i].Respuesta) {
			case 'MEJOR DE LO QUE ESPERABA':
				labels.push(params[i].Respuesta);
				data.push(params[i].cantidad);
				break;
			case 'TAL COMO LO ESPERABA.':
				labels.push(params[i].Respuesta);
				data.push(params[i].cantidad);
				break;
			case 'PEOR DE LO QUE ESPERABA.':
				labels.push(params[i].Respuesta);
				data.push(params[i].cantidad);
				break;
			default:
				coment.push(params[i].Respuesta, params[i].cantidad);
				break;
		}

	} Graficar(labels, data);
	getComent(coment);

}
function getComent(params) {
	$('#divdocument').empty();
for (let i = 0; i < params.length; i++) {
	$('#divdocument').append('<div class="alert alert-primary p-1" role="alert"> '+params[i]+'</div>');	
}
}
