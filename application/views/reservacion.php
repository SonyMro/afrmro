<style>
	.font {
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
	}
</style>
<div class="container-fluid">
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
						<input type="text" class="form-control">
					</div>
					<button class="btn btn-success pl-5 pr-5" onclick="BuscarReserva()">
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
						<h4>FECHA:</h4> <br>
						<input type="text" class="form-control" name="txtFecha" value="" readonly>
					</div>
					<div class="form-inline float-sm-right pl-5">
						<h4>REFERENCIA:</h4> <br>
						<input type="text" class="form-control" name="txtRef" value="" readonly>
					</div> <br>
					<div class="col-12 pb-5 pt-5">
						<h2>¿ES TU INFORMACIÓN?</h2>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NOMBRE DEL RESPONSABLE.</h4>
						<div class="row">
							<div class="col-1"></div> <input type="text" name="txtRespon" class="form-control col-10" readonly>
						</div>

					</div>
					<div class="col-6 p-1">
						<h4>INSTITUCIÓN/GRUPO.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" name="txtGrup" class="form-control col-10" readonly>
						</div>
					</div>
					<br />

					<br />
					<div class="col-6 p-1">
						<h4>CORREO.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" name="txtMail" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO ADULTOS.</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" name="txtAdult" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO NIÑOS</h4>
						<div class="row">
							<div class="col-1"></div><input type="text" name="txtNinios" class="form-control col-10" readonly>
						</div>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>SERVICIOS.</h4>
						<div class="row">
							<div class="col-1"></div><textarea name="txtServ" id="" class="form-control col-10" rows="3" readonly></textarea>
						</div>
					</div>
					<div class="form-inline float-sm-right pl-4 pb-2 pt-2">
						<h4>INGRESE EL NÚMERO DE BUS O CONVOY:</h4> <br>
						<input type="text" class="form-control ml-3" value="" name="txtConvoy" required>
					</div> <br> <br>
					<div class="col-12 form-inline pl-1 pb-2 pt-2">
						<div class="row">
							<h4 class="pl-4">¿ES LA PRIMERA VEZ QUE HA VISITADO AFRICAM SAFARI? </h4>
						</div>
						<label class="radio-inline h5 ml-4 pr-2"><input type="radio" name="txtvisita" required checked>Si</label>
						<label class="radio-inline h5 ml-2 pr-2"><input type="radio" name="txtvisita" required>No</label>
					</div>
					<div class="col-6 pr-5">
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
