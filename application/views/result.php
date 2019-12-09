<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}

	.anyClass {
		height: 500px;
		overflow-y: scroll;
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
				<div class="anyClass">
					<div class="list-group " id="divpre">

					</div>
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
					<Button id="btnResultados" class='btn btn-success' onclick="verResultPregunta();">Ver Resultados</Button>
				</div>
			</center>
			<div class="card " style="width: 800px;">
				<div class="card-header bg-dark text-white" id="cpreg">
					Pregunta
				</div>
				<div class="card-body">
					<canvas id="MiGrafica" width="400" height="300">

					</canvas>
				</div>
				<div class="card-footer text-muted  bg-dark text-white">
					<br>
				</div>
			</div> <br />
			<div class="card " style="width: 800px;">
				<div class="card-header bg-dark text-white" id="cpreg">
					Comentarios
				</div>
				<div class="card-body">
					<div class="anyClass">
						<div id="divdocument">

						</div>
					</div>
				</div>
				<div class="card-footer text-muted  bg-dark text-white">
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/result.js">

</script>
