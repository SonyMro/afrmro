<div class="container-fluid">
	<center>
		<h1>
			<font color='#FFF79F'>Canjear Premios.</font>
		</h1>
	</center> <br>
	<div class="row">
		<div class="col-sm-3 col-md-6 col-lg-4">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<br>
				</div>
				<div class="card-body ">
					<div class="form-group">
						<h3 for="name">Ingresa codigo:</h3>
						<input type="text" class="form-control" id="txtcode">
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-success" onclick="buscarPremio();">Buscar</button>
					</div>
					<div id="vmPremio">
						<div class="form-group">
							<h4 id="vmname"></h4>
							<input type="tex" style="display:none" id="txtInter">
							<input type="tex" style="display:none" id="txtID">
							<img src="" width="200" height="200" id="imgvm">
						</div>
						<div class="form-group">
							<button type="button" onclick="canjear();" class="btn btn-info pr-3 pl-3">Canjear</button>
						</div>
					</div>
				</div>
				<div class="card-footer bg-dark">
					<br>
				</div>
			</div> <br>
		</div>
		<div class="col-sm-9 col-md-6 col-lg-8">
			<center>
				<div class="row">
					<div class="col p-2">
						<button class="btn btn-success" onclick=" disponibles()">Ver Disponibles</button>
					</div>
					<div class="col p-2">
						<button class="btn btn-info" onclick="allcode();">Ver todos</button>
					</div>
				</div>
			</center>
			<table class="table table-hover table-sm">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Codigo</th>
						<th>Intercambio</th>
						<th>Foto</th>
					</tr>
				</thead>
				<tbody class="table-light" id="tblPremios">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		//console.log('hi');
		allcode();
		$('#vmPremio').hide();
	});

	function allcode() {
		var base_url = window.location.origin
		$('#tblPremios').empty();
		$.ajax({
			type: "POST",
			url: base_url + "/sc/index.php/cllCodigo/getCode",
			data: "",
			dataType: "JSON",
			success: function(response) {

				var tabla = '';
				console.log(response.result);
				/**/
				if (response.status == 'ok') {
					for (let i = 0; i < response.result.length; i++) {
						if (response.result[i].intercambio == 'si') {
							tabla += '<tr class="alert-danger">' +
								'<td>' + response.result[i].IdCodigo + '</td>' +
								'<td>' + response.result[i].Nombre + '</td>' +
								'<td>' + response.result[i].codigo + '</td>' +
								'<td>' + response.result[i].intercambio + '</td>' +
								'<td> <img src="' + response.result[i].foto + '" alt="" width="100" height="100">' + '</img></td>' +
								'</tr>';
						} else {
							tabla += '<tr  class="alert-success">' +
								'<td>' + response.result[i].IdCodigo + '</td>' +
								'<td>' + response.result[i].Nombre + '</td>' +
								'<td>' + response.result[i].codigo + '</td>' +
								'<td>' + response.result[i].intercambio + '</td>' +
								'<td> <img src="' + response.result[i].foto + '" alt="" width="100" height="100">' + '</img></td>' +
								'</tr>';
						}

					}
				} else {
					Swal.fire('Error.', 'Contacte al administrador.', 'error');
				}
				$('#tblPremios').append(tabla);
			}
		});
	}

	function disponibles() {
		var base_url = window.location.origin
		$('#tblPremios').empty();
		$.ajax({
			type: "POST",
			url: base_url + "/sc/index.php/cllCodigo/getCode",
			data: "",
			dataType: "JSON",
			success: function(response) {

				var tabla = '';
				console.log(response.result);
				/**/
				if (response.status == 'ok') {
					for (let i = 0; i < response.result.length; i++) {
						if (response.result[i].intercambio == 'no') {
							tabla += '<tr class="alert-success">' +
								'<td>' + response.result[i].IdCodigo + '</td>' +
								'<td>' + response.result[i].Nombre + '</td>' +
								'<td>' + response.result[i].codigo + '</td>' +
								'<td>' + response.result[i].intercambio + '</td>' +
								'<td> <img src="' + response.result[i].foto + '" alt="" width="100" height="100">' + '</img></td>' +
								'</tr>';
						}

					}
				} else {
					Swal.fire('Error.', 'Contacte al administrador.', 'error');
				}
				$('#tblPremios').append(tabla);
			}
		});
	}

	function buscarPremio() {
		//console.log(params.value);
		$('#vmPremio').show();
		$('#tblPremios').empty();
		//	$('#vmPremio').empty();
		var base_url = window.location.origin
		$.ajax({
			type: "POST",
			url: base_url + "/sc/index.php/cllCodigo/buscarCode",
			data: {
				code: $('#txtcode').val()
			},
			dataType: "JSON",
			success: function(response) {
				var tabla = '';
				console.log(response.result);
				/**/
				if (response.status == 'ok') {
					if (response.result[0].intercambio == 'no') {
						tabla += '<tr class="alert-success">' +
							'<td>' + response.result[0].IdCodigo + '</td>' +
							'<td>' + response.result[0].Nombre + '</td>' +
							'<td>' + response.result[0].codigo + '</td>' +
							'<td>' + response.result[0].intercambio + '</td>' +
							'<td> <img src="' + response.result[0].foto + '" alt="" width="100" height="100">' + '</img></td>' +
							'</tr>';
					} else {
						tabla += '<tr class="alert-danger">' +
							'<td>' + response.result[0].IdCodigo + '</td>' +
							'<td>' + response.result[0].Nombre + '</td>' +
							'<td>' + response.result[0].codigo + '</td>' +
							'<td>' + response.result[0].intercambio + '</td>' +
							'<td> <img src="' + response.result[0].foto + '" alt="" width="100" height="100">' + '</img></td>' +
							'</tr>';
					}

					$('#vmname').text(response.result[0].Nombre);
					$('#txtID').val(response.result[0].IdCodigo);
					$("#imgvm").attr("src", response.result[0].foto);
					$('#txtInter').val(response.result[0].intercambio);
					//txtInter
				} else {
					Swal.fire('Error.', 'Este código no existe,  verifica que este escrito correctamente.', 'error');
				}
				$('#tblPremios').append(tabla);
			}
		});
	}

	function canjear() {
		var base_url = window.location.origin;
		console.log($("#txtID").val());
		if ($('#txtInter').val() == 'no') {
			$.ajax({
				type: "POST",
				url: base_url + "/sc/index.php/cllCodigo/canje",
				data: {
					id: $("#txtID").val()
				},
				dataType: "JSON",
				success: function(response) {
					if (response.status = 'ok') {
						$('#vmPremio').hide();
						$("#txtID").val('');
						$('#intercambio').val('')
						Swal.fire(
							'Muy bien!',
							'Él se ha intercambiado el premio.!',
							'success'
						);
					} else {
						Swal.fire('Hubo un error.', 'Intente otra vez.', 'error');
					}
				}
			});
			disponibles()
		} else {
			disponibles()
			Swal.fire('Upps¡', 'Parece que este premio ya se ha canjeado.', 'error');
		}
	}
</script>
