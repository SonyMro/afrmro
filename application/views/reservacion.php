<style>
	.font {
		text-transform: uppercase;
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
	}

	.inputFont {
		font-family: "Times New Roman", Times, serif;
		font-size: 18px;
	}
</style>
<div class="container-fluid font">
	<h1 class="text-light  text-center aumenta">
		<font color='#FFF79F'> Evaluación de servicio.</font>
	</h1>
	<br>
	<div class="row">
		<div class="col-sm-12 pb-4" id="sec-1">
			<div class="card text-center">
				<div class="card-header bg-dark">
					<br>
				</div>
				<div class="card-body ">
					<h5 class="card-title">
						BUSCAR NÚMERO DE RESERVACIÓN.
					</h5>
					<div class="form-group">
						<input type="text" id="txtReservacion" class=" form-control inputFont" class="form-control inputFont" >
						<div class="" id="valfolio">

						</div>
					</div>
					<button class="btn btn-success pl-5 pr-5" onclick="consultarReservacion();">
						BUSCAR
					</button>
				</div>
				<div class="card-footer bg-dark">
					<br>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="col-sm-12" id="sec-2">
		<form action="<?php echo site_url('cllEncuesta/insertar') ?>" method="POST">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h2> INFORMACIÓN DE RESERVACIÓN.</h2>
				</div>
				<div class="card-body row pl-0">
					<div class="form-inline float-sm-right pl-5">
						<h4>FeCHA:</h4> <br>
						<input type="text" class="form-control" name="txtFecha" id="txtFecha" readonly>
					</div> <br> <br>
					<br>
					<br>
					<div class="form-inline float-sm-right pl-5">
						<h4>REFERENCIA:</h4> <br>
						<input type="text" class="form-control" name="txtRef" id="txtRef" readonly>
					</div> <br>
					<div class="col-12 pb-5 pt-5">
						<h2>¿ES TU INFORMACIÓN?</h2>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NOMBRE DEL RESPONSABLE.</h4>
						<div class="row">
							<div class="col-1"></div> <input type="text" id="txtRespon" name="txtRespon" class="form-control col-10" readonly>
						</div>

					</div>
					<div class="col-6 p-1">
						<h4>INSTITUCIÓN/GRUPO.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" id="txtGrup" name="txtGrup" class="form-control col-10" readonly>
						</div>
					</div>
					<br />

					<br />
					<div class="col-6 p-1">
						<h4>CORREO.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" id="txtMail" name="txtMail" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO ADULTOS.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" id="txtAdult" name="txtAdult" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO NIÑOS</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" id='txtNinios' name="txtNinios" class="form-control col-10" readonly>
						</div>
					</div><br />
					<div class="col-6 p-1">
						<h4>TElefono</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" id='txtTel' name="txtTel" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>SERVICIOS.</h4>
						<div class="row">
							<div class="col-1"></div><textarea name="txtServ" id="txtServ" class="form-control col-10" rows="3" readonly></textarea>
						</div>
					</div>
					<div class="col-12 form-inline float-sm-right pl-4 pb-2 pt-2">
						<h4>INGRESE EL NÚMERO DE BUS O CONVOY:</h4> <br>
						<input type="number" class="form-control ml-3 inputFont" value="" name="txtConvoy" required>
					</div> <br> <br>
					<div class="col-12  pl-1 pb-2 pt-2">
						<div class="row">
							<h4 class="pl-5">¿ES LA PRIMERA VEZ QUE HA VISITADO AFRICAM SAFARI? </h4>
						</div>
						<label class="radio-inline h5 ml-4 pr-2"><input type="radio" name="txtvisita" value="si" required>Si</label>
						<label class="radio-inline h5 ml-2 pr-2"><input type="radio" name="txtvisita" value="no" required>No</label>
					</div>
					<div class="col-6 pr-5 pl-4">
						<button class="btn btn-danger btn-lg btn-block" onclick="noReser()">
							NO ES MI INFORMACIÓN.
						</button>
					</div>
					<div class="col-6">
						<button class="btn btn-success btn-lg btn-block" type="submit">
							SI ES MI INFORMACIÓN.
						</button>
					</div>
				</div>
				<div class="card-footer text-muted bg-dark text-white">
					<br>
				</div>
			</div>
		</form>
	</div>
	<br>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/reserva.js"></script>
