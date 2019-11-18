$(document).ready(
	Mover()
);

function Premios(handleData) {
	var base_url = window.location.origin;
	fetch(base_url+'/sc/index.php/cllPremios/show')
		.then(function (response) {
			return response.json();
		})
		.then(function (myJson) {
			handleData(myJson); 
		});
}
var contnador = 0;
var band= true;
function parar() {
	var base_url = window.location.origin;
     contnador+=1;
	if (contnador%2==0) {
		$('#btnplay').removeClass('btn-success').addClass('btn-warning');
		$('#imgBoton').attr('src', base_url + '/sc/image/stop.png');
		console.log(contnador);
		band=true;
	} else {
		band= false;
		$('#btnplay').removeClass('btn-warning').addClass('btn-success');
		$('#imgBoton').attr('src',base_url+'/sc/image/play.png');
		$('#myModal').modal('show');
		setTimeout(function () { 
			$('#myModal').modal('hide');
			 capturado(); 
			 console.log('time'); 
			}, 3000);
	}
	
}
function Mover() {
	var datos=[];
	Premios(function (params) {
		//console.log(params)
		datos=params;
		var cont=0;
		let mLetf=0;
		let img=document.getElementById('img5');
		console.log(datos.length);
	    var time=setInterval(function () {
				if (band) {				
					img.style.marginLeft = mLetf + 'px';
					mLetf += 200;					
					if (mLetf >= 500) {
						mLetf = 0;
						if (cont==datos.length) {
						//console.log(cont);
							cont = 0;
						} else {
						//console.log('no' + cont);
							$('#img5').attr('src', datos[cont].foto);
							$('#imgModal').attr('src', datos[cont].foto);
							$('#img5').attr('class', datos[cont].IdPremio);
							$('#imgmod').attr('id', datos[cont].IdPremio);
							//$().html();imgmod imgModal
							$('#hname').html('HAZ ATRAPADO UN: ' + datos[cont].IdPremio+' '+datos[cont].IdPremio);
							//$('#img5').attr('id', datos[cont].foto);
							cont++;
						}
					}
				}else{
					
				}
		
			},100);
	});
}var contar=0;
function capturado() {
	if (contar<=3) {
		contar++;
	}
	else{
		$('#btnplay').attr('disabled');
	}

}

	function ajax() {
		$.ajax({
			type: "POST",
			url: base_url + '/sc/index.php/cllPremios/show',
			contentType: "application/json; charset=utf-8;",
			dataType: "json",
			success: function (response) {
				handleData(response); 
			},
			error: function (error) {
				console.log(error)
			}
		});
	}



function generatePasswordRand(length, type) {
	switch (type) {
		case 'num': characters = "0123456789"; break;
		case 'alf': characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;
		case 'rand': break;
		default: characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; break;
	}
	var pass = "";
	for (i = 0; i < length; i++) {
		if (type == 'rand') {
			pass += String.fromCharCode((Math.floor((Math.random() * 100)) % 94) + 33);

		} else {
			pass += characters.charAt(Math.floor(Math.random() * characters.length));
		}
	}
	return pass;
}


