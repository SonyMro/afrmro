$(document).ready(function () {  
	listarPreguntas();
});
let miCanvas = document.getElementById('MiGrafica').getContext('2d');

function Graficar(params) {

	var chart = new Chart(miCanvas, {
		type: params,
		data: {
			labels: ["5", "4", "3", "2", "1"],
			datasets: [
				{
					label: "Resultados",
					backgroundColor: ["#808b96", "#E59866", "#82e0aa", "#7fb3d5", " #d98880"],
					borderColor: "#f4d03f",
					data: [12, 30, 25, 55, 3]
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
	console.log(idG);
	$.ajax({
		url: base_url + '/sc/index.php/cllPreguntas/buscarPreguntas',
		type: 'POST',
		data: { idg: idG,idr:idU},
		success: function (response) {
			if (response.status=='ok') {
				console.log(response.result.length);
				for (let i = 0; i < response.result.length; i++) {
					$('#divpre').append('<li class="btn btn-outline-dark" value="'+
					response.result[i].IdPregunta+'">' + response.result[i].Pregunta+'</li>');		
				}
			} else {
				console.log(response.status);
			}
			console.log(response.result);
		}
	});
}
