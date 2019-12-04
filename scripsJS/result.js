$(document).ready(function () {  
	listarPreguntas();
});
let miCanvas = document.getElementById('MiGrafica').getContext('2d');

function Graficar(labels,data) {

	var chart = new Chart(miCanvas, {
		type: 'bar',
		data: {
			labels:labels,
			datasets: [
				{
					label: "Resultados",
					backgroundColor: ["#808b96", "#E59866", "#82e0aa", "#7fb3d5", " #d98880"],
					borderColor: "#f4d03f",
					data: data,
				}
			]
		},
		options: {
			scales: {
				xAxes:
					[{
						ticks:
							{ fontSize: 14 }
					}],
				yAxes:
					[{
						ticks:
							{ fontSize: 14 }
					}]
			}
		}
	});	

}

function listarPreguntas() {
	var base_url = window.location.origin;
	var idG = $("#lIdg").val();
	var idU = $("#lId").val();
	$("#divpre").empty();

	//console.log(idG);
	$.ajax({
		url: base_url + '/sc/index.php/cllPreguntas/buscarPreguntas',
		type: 'POST',
		data: { idg: idG,idr:idU},
		success: function (response) {
			if (response.status=='ok') {
				console.log(response.result.length);
				for (let i = 0; i < response.result.length; i++) {
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
function getPregunt(eval) {
	$('#cpreg').empty();
	 $("#txtDesde").val('');
	 $("#txtHasta").val('');
	var id = $(eval).attr('id');
	var preg = $('#' + id).text();
	var idinput = $('#txtP'+id).val();
	miCanvas.clearRect(0, 0, miCanvas.width, miCanvas.height);
	$('#cpreg').append('<h3>' + preg + 
		'</h3><input id="Idpregunt" style="display: none;" value="' + id +'"><input id="txtPcard" style="display: none;" value="' + idinput +'">');
}
function verResultPregunta() {
	console.log('vamos');
	var id = $("#Idpregunt").val();
	var desde=$("#txtDesde").val();
	var hasta=$("#txtHasta").val();
	var tipo = $("#txtPcard").val();
	var base_url = window.location.origin;
	console.log(id+' '+desde+' '+hasta+' '+tipo);
/**/
	if (id.length>0 && desde.length>0 &&hasta.length>0) {
		$.ajax({
			type: "GET",
			url: base_url + '/sc/index.php/cllRespuestas/resultados?idp='+id+'&desde='+desde+'&hasta='+hasta,		
			success: function (response) {
				console.log(response);
				if (response.status=="ok") {
					switch (tipo) {
						case "likert":
							likert(response.result);
							break;
						case "abierta":
							abierta(response.result);
							break;
						case "abiertalarga":
							abiertalarga(response.result);
							break;
						case "sino":
							sino(response.result);
							break;
						case "esperaba":
						esperaba(response.result);
						break;
						default:
							alert('Verica que esta haciendo bien la consulta');
							break;
					}
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Algo anda mal en el servidor contacte al administrador!',
					})
				}
			
			}
		});	/*Ajax */
	} else {
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Verifique que hayas seleccionado una pregunta o poner bien la fecha. !',
		})
	}
	
}
function likert(params) {
	var labels = [];
	var data=[];
	var coment=[];
//console.log(params);
for (let i = 0; i < params.length; i++) {
	switch (params[i].Respuesta) {
		case '5':
			labels.push(params[i].Respuesta);
			data.push(parseInt(params[i].cantidad));
		break;
		case '4':
			labels.push(params[i].Respuesta);
			data.push(parseInt(params[i].cantidad));
			break;
		case '3':
			labels.push(params[i].Respuesta);
			data.push(parseInt(params[i].cantidad));
		break;
		case '2':
			labels.push(params[i].Respuesta);
			data.push(parseInt(params[i].cantidad));
			break;
		case '1':
			labels.push(params[i].Respuesta);
			data.push(parseInt(params[i].cantidad));
			break;
		default:
			coment.push(params[i].Respuesta, params[i].cantidad);
			break;
	}	
}
console.log('---------------------Arreglo--------------------');
//console.log(labels);
//console.log(data);
	Graficar(labels,data);
console.log('---------------------Comentarios--------------------------------');
//console.log(coment);
	getComent(coment)
}
function abierta(params) {
console.log(params);
}
function abiertalarga(params) {
console.log(params);
}
function sino(params) {
console.log(params);
}
function esperaba(params) {
console.log(params);
}
function getComent(params) {
	$('#divdocument').empty();
for (let i = 0; i < params.length; i++) {
	$('#divdocument').append('<div class="alert alert-primary p-1" role="alert"> '+params[i]+'</div>');	
}
}
