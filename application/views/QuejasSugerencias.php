<style>
	.font {
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
	}

	.inputFont {
		font-family: "Times New Roman", Times, serif;
		font-size: 18px;
	}
</style>

<div class="container-fluid font">
	<br>
	<p class="h1 text-center text-light display-4">
		<font color="#FFE98F" class="brillo"><b>QUEJAS Y SUGERENCIAS</b></font>
	</p><br>
	<br>
	<div class="row">
		<div class="col">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h3> POR FAVOR INGRESE LOS SIGUIENTES DATOS:</h3>
				</div>
				<div class="card-body">
					<h4 class="card-title "></h4>
					<form action="<?php echo site_url('/cllBuzon/insertarBuzon') ?>" method="POST">
						<div class="form-group form-inline float-right">
							<h5>Fecha:</h5>
							<input type="text" id="txtFecha" name="txtFecha" type="text" readonly class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
						</div><br><br><br><br>
						<div class="form-row">
							<div class="col-md-6 mb-6">
								<h3>
									<font color="#1D6B84">NOMBRE:</font>
								</h3>
								<input type="text" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" onblur="ValidarNombre(this)" name="txtNombre" id="txtNombre" placeholder="Juanito" required>
								<div class="" id="valNombre">
								</div>
							</div>
							<div class="col-md-6 mb-6">
								<h3 for="validationCustom02">
									<font color="#1D6B84">APELLIDOS:</font>
								</h3>
								<input type="text" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" onblur="ValidarApellido(this)" name="txtApes" id="txtApes" placeholder="Peréz lopez" required>
								<div class="" id="valApes">

								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-6">
								<h3 for="validationCustom01">
									<font color="#1D6B84">EDAD:</font>
								</h3>
								<input type="number" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" name="txtEdad" id="txtEdad" onblur="validarEdad(this)" placeholder="26" required>
								<div class="" id="valEdad">

								</div>
							</div>
							<div class="col-md-6 mb-6">
								<h3 for="validationCustom02">
									<font color="#1D6B84">TELÉFONO:</font>
								</h3>
								<input type="number" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" name="txtTel" id="txtTel" placeholder="+52 5511678222" onblur="validarTelefono(this)" required>
								<div class="" id="valTel">
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-6">
								<h3 for="validationCustom01">
									<font color="#1D6B84">CORREO:</font>
								</h3>
								<input type="mail" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" name="txtMail" id="txtMail" placeholder="juanito.afri@gmail.com" onblur="validarCorreo(this)" required>
								<div class="" id="valMail">

								</div>
							</div>
							<div class="col-md-6 mb-6">
								<h3 for="validationCustom02">
									<font color="#1D6B84">CÓDIGO POSTAL:</font>
								</h3>
								<input type="number" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" name="txtCp" id="txtCp" placeholder="73940" onblur="validarCodigoPostal(this)" required>
								<div class="" id="valCp">

								</div>
							</div>
						</div>
						<div class="form-group">
							<h3 for="validationCustom02">
								<font color="#1D6B84">DIRECCIÓN:</font>
							</h3>
							<input type="text" class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" onblur="validarDir(this)" name="txtDir" id="txtDir" placeholder="calle benito juarez numero 15" required>
							<div class="" id="valDir">

							</div>

						</div>
						<br>
						<fieldset>
							<div class="pr-1">
								<h2 for="inputPassword6" class="pr-5">
									<font color="#1D6B84">REALIZO SU SAFARI EN:</font>
								</h2>
								<div class="row">
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio1" id='rdop2s' value="Automovil" required>AUTOMÓVIL <br>
										</h5>
									</div>
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio1" id='rdop2n' value="bus africamion" required>AUTOBÚS AFRICAMIÓN (RENTADO A AFRICAM)
										</h5>
									</div>
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio1" id='rdop2n' value="Bus externo" required>AUTOBÚS EXTERNO (NO RENTADO A AFRICAM)
										</h5>
									</div>
								</div>
							</div>
						</fieldset><br>
						<fieldset>
							<div class="">
								<h3 class="pr-5">
									<font color="#1D6B84">NOS RECOMENDARÍA: </font>
								</h3>
								<div class="row">
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio2" id='rdop2s' value="Ampliamente" required>AMPLIAMENTE

										</h5>
									</div>
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio2" id='rdop2n' value="Regular" required>REGULAR</h5>
									</div>
									<div class="col">
										<h5 class="radio-inline"><input type="radio" name="optradio2" id='rdop2n' value="Nada" required>NADA</h5>
									</div>
								</div>
							</div>
						</fieldset> <br>
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">
									<font color="#1D6B84">ESCRIBA SUS QUEJAS Y SUGERENCIAS</font>
								</h3>
								<div class="mb-3">
									<textarea class="form-control brillo2 inputFont" onclick="eliminarEfecto(this)" name="txtQs" id="txtQs" rows="5" onblur="validarComentarios(this)" placeholder="*La guía no contesto no fue amable." required></textarea>
									<div class="" id="valQs">
									</div>
								</div>
							</div>
						</div> <br>
						<button type="submit" class="btn btn-success btn-lg btn-block" onclick="enviarDatos()">ENVIAR</button>
					</form>
				</div>
				<div class="card-footer text-muted bg-dark">
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/buzon.js"></script>
