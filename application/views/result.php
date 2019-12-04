<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style>
<div class="container-fluid font">

	<center>
		<h1 class='text-white'> <b>
				<font color='#f4d03f'>Resultados.</font>
			</b>
		</h1>
	</center>
	<div class="pb-5 pb-5">
		<ul class="list-group list-group-horizontal-xl">
			<li class="list-group-item list-group-item-primary" id="lId" value="<?php echo $this->session->userdata("id"); ?>"><?php echo $this->session->userdata("nombre"); ?></li>
			<li class="list-group-item list-group-item-primary" value=><?php echo $this->session->userdata("pat"); ?></li>
			<li class="list-group-item list-group-item-primary" value=><?php echo $this->session->userdata("mat"); ?></li>
			<li class="list-group-item list-group-item-warning" id="lIdg" value="<?php echo $this->session->userdata("idg"); ?>"><?php echo $this->session->userdata("geren"); ?></li>
			<li class="list-group-item list-group-item-success" id="lIdr" value="<?php echo $this->session->userdata("idR"); ?>"><?php echo $this->session->userdata("rol"); ?></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-sm-2 col-md-3 col-lg-4">
			<div class="card " style="width: 25rem;">
				<div class="card-header bg-dark text-white">
					<b>Lista de preguntas<b>
				</div>
				<div class="list-group" id="divpre">

					<li class="btn btn-outline-dark">EL SERVICIO EDUCATIVO ESTÁ EJECUTANDO O EJECUTARA EN LA CURRICULA</li>
					<li class="btn btn-outline-dark">EL SERVICIO EDUCATIVO O EJECUTARA EN LA CURRICULA</li>

				</div>
			</div>
		</div>
		<div class="col-sm-10 col-md-9 col-lg-8">
			<div class='row'>
				<div class="col">
					<div class="form-group">
						<h4 class='text-white'><b>Desde:</b></h4>
						<input id="txtDesde" type="date" name="bday" data-date-format="DD MMMM YYYY" max="3000-12-31" min="1000-01-01" class="form-control">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<h4 class='text-white'><b>Hasta:</b></b></h4>
						<input id="txtHasta" type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control">
					</div>
				</div> <br>

			</div>
			<center>
				<div class="pb-3">
					<Button id="btnResultados" class='btn btn-success'>Ver Resultados</Button>
				</div>
			</center>
			<div class="card " style="width: 800px;">
				<div class="card-header bg-dark text-white">
					Pregunta
				</div>
				<div class="card-body">
					<canvas id="MiGrafica" width="400" height="300">

					</canvas>
				</div>
				<div class="card-footer text-muted">
					<div class="row">
						<div class="col"><button onclick=" Graficar('bar')" class="btn btn-info">Barra</button></div>
						<div class="col"><button onclick=" Graficar('line')" class="btn btn-success">Lineal</button></div>
						<div class="col"><button onclick=" Graficar('pie')" class="btn btn-primary">Pastel</button></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/result.js">

</script>
