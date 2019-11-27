$(document).ready(
	function (params) {
		Mover();
		$('.cod').hide();
		generatePasswordRand(6);
	});


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
var contFin = 0;
let vid = document.getElementById("audio");
let vid1 = document.getElementById("audio1"); 
let vid2 = document.getElementById("audio2"); 

function musica() {
	console.log('cddc');
	vid.play();
}
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
		vid.play();
		setTimeout(function () { 
			$('#myModal').modal('hide');
			var imgCap = document.getElementById("imgModal").src;
			var textoMod = document.getElementById("hname").textContent;
			var idMod= document.getElementById('txtMod').value;
			contFin++;
			$('#img'+contFin).attr('src', imgCap).addClass('brillo');
			$('#h' + contFin).html(textoMod);
			$('#div' + contFin).append('<button class="btn btn-info font code" id=' + idMod +'  onclick="Codigo(this)">Ver código.</button>');
			 capturado();
			 console.log('time'+ contFin); 
			}, 2000);
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
							$('#hname').html('' + datos[cont].Nombre);
							$('#txtMod').val(datos[cont].IdPremio);
							//$('#img5').attr('id', datos[cont].foto);
							cont++;
						}
					}
				}else{
					
				}
		
			},100);
	});
}


var contar=1;
function capturado() {
	if (contar<3) {
		console.log('parar: '+contar);
		contar++;
	}
	else{
		console.log('desabilidar');
		//$('#btnplay').attr('disabled');
		band=false;
		document.getElementById("btnplay").disabled = true;
		Swal.fire({
			title: 'Se han acabado tus 3 oportunidades, Escoge tu premio',
			showClass: {
				popup: 'animated fadeInDown faster'
			},
			hideClass: {
				popup: 'animated fadeOutUp faster'
			}
		});
		vid2.play();
		$('.cod').show(1000)
	}
}
	function ajax(){
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
		case 'num': characters = "0123456789";
		 break;
		case 'alf': characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			break;
		case 'rand': 
		break;
		default: characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
		break;
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
var getCode = true;
var gencode = '';
function Codigo(eval) {
	console.log(eval.id);
	//document.getElementsByClassName('code').disabled=true;
	$(".code").attr('disabled', 'disabled');
	document.getElementById(eval.id).disabled = false;
	vid1.play();
	if (getCode) {
		gencode = generatePasswordRand(6);
		Swal.fire(
			'Código: ' + gencode,
			'Este es tu código <br>' + 'Canjéalo en algunas de las tiendas',
			'success'
		);

		getCode = false
		registrarCode(eval.id,gencode);
	} else {
		Swal.fire(
			'Código: ' + gencode,
			'Este es tu código <br>' + 'Canjéalo en algunas de las tiendas',
			'success'
		);
	}
}
function registrarCode(idPremio, codigo) {
	var base_url = window.location.origin;
	$.ajax({
		url: base_url + '/sc/index.php/cllPremios/code',
		type: 'POST',
		data: { IdPremio: idPremio, code: codigo },
		success: function (result) {
			console.log(result)

		},
		error: function (xhr, textStatus, errorMessage) {
			console.log("ERROR" + errorMessage.errorMessage + textStatus + xhr);
		}
	});/**/
}


setInterval(
	function () {
		apacidadMas2();
		apacidadMenos2();
	}, 800);

function apacidadMas2() {
	$('.brilloBoton').animate({
		'opacity': '0.05'
	}, "slow");
}

function apacidadMenos2() {
	$('.brilloBoton').animate({
		'opacity': '1'
	}, "slow");
}
setInterval(
	function () {
		apacidadMas();
		apacidadMenos();
	}, 1000);

function apacidadMas() {
	$('.brillo').animate({
		'opacity': '0.05'
	}, "slow");
}

function apacidadMenos() {
	$('.brillo').animate({
		'opacity': '1'
	}, "slow");
}
