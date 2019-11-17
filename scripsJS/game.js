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
     contnador+=1;
	if (contnador%2==0) {
		console.log(contnador);
		band=true;
		return band;
		//band= false;
	} else {
		band= false;
	//	band=false
	}
}
function Mover() {
	var datos=[];
	Premios(function (params) {
		//console.log(params)
		datos=params;
		var cont=0;
		let mLetf=0;
		let tam=0;
		let img=document.getElementById('img5');
		console.log(datos.length);
	    var time=setInterval(function () {
				if (band) {
					//console.log(cont);				
					img.style.marginLeft = mLetf + 'px';
					mLetf += 200;
					//console.log(mLetf);
					console.log(band);
					if (mLetf >= 400 & mLetf <= 500) {
						//img.style.border = "thick solid #ff0000";
						img.style.backgroundColor = 'red';
						img.style.width = "410px";
						img.style.height = "410px";
					} else {
						img.style.backgroundColor = '';
						//img.style.border = "";
						img.style.width = "250px";
						img.style.height = "250px";
					}
					if (mLetf >= 800) {
						mLetf = 0;
						if (cont==datos.length) {
						//console.log(cont);
							cont = 0;
						} else {
						//console.log('no' + cont);
							$('#img5').attr('src', datos[cont].foto);
							cont++;
						}
						
					}
				}else{
					console.log('Stop');
				}
		
			},100);
	});

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


