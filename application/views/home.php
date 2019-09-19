<div class="container-fluid">
	<br />
	<center>
		<h1>¿Qué tal tu visita explorador? <br> Ayúdanos a ser mejores.</h1>
	</center> <br> <br> <br>
	<div class="row p-2">

		<div class="col p-3 salto" id="salto1">
			<a class="btn btn-success" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h4> ¿Quieres felicitarnos?</h4>
				</strong>
			</a>
		</div>
		<div class="col p-3 salto" id="salto2">
			<a class="btn btn-success" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h4> Si tienes una reservación <br> ingresa aquí</h4>
				</strong>
			</a>
		</div>
		<div class="col p-3 salto" id="salto1">
			<a class="btn btn-success" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h4>¿Quieres dejarnos una <br>queja o sugerencia?</h4>
				</strong>
			</a>
		</div>
	</div>
	<!-- 
	<div class="row">
		<div class="col-md-4">
			<div class="card text-white bg-dark" style="width: 18rem;">
				<div class="card-header">
					<br>
				</div>
				<img src="<?php echo base_url() ?>image/africam.png" width="150px" height="150px" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Opciones</h5>
					<div class="list-group">
						<a type="button" class="btn btn-secondary" href="<?php echo base_url('/index.php/home/fel'); ?>">
							<h5><strong>Felicitaciones ►</strong></h5>
						</a> <br>
						<a type="button" href="<?php echo base_url('/index.php/home/QuejasSugerencias') ?>" class="btn btn-secondary">
							<h5><strong>Quejas y/o Sugerencias ►</strong></h5>
						</a>
					</div>
				</div>
				<div class="card-footer text-muted">
					<br>
				</div>
			</div>
		</div>
		<div class="col-md-8 pl-5">

			<h1 class="text-light">
				<a href="" class="text-light">
					<font size="200px">¿Qué tal tu visita explorador? <br> Ayúdanos a ser mejores.</font>
				</a>
			</h1>

		</div>
	</div>-->
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function() {
				menos();
				mas();
			}, 1500);
		});

		function menos() {
			//	$(".salto").append("<br>");
			$(".salto").animate({
				top: '-=60px'
			});
		}
		function mas() {
			$(".salto").animate({
				top: '+=60px'
			});
		}
	</script>
</div> 
<!--probando git-->
