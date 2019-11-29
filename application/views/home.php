<style>
	.font {
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
	}
</style>
<div class="container-fluid font">
	<br />
	<center>
		<h1>
			<font color='#e67e22' class="brillo"> ¿Qué tal tu visita explorador?</font>
		</h1><br>
		<h3>
			<font color='#f4d03f' class="aumenta">¡Ayúdanos a ser mejores!</font>
		</h3>

	</center> <br> <br> <br>
	<div class="row p-2">
		<div class="col p-3 salto" id="salto1">
			<a href="<?php echo base_url('/index.php/home/fel'); ?>" class="btn btn-success" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h4> ¿Quieres</h4>
					<h3>
						<font color='#f4d03f'>felicitarnos?</font>
					</h3>

				</strong> <br>
				<img src="<?php echo base_url() ?>image/felicidad.png" width="100" height="100" alt="https://www.flaticon.es/icono-gratis/programar_1497835">
			</a>
		</div>
		<div class="col p-3 salto" id="salto2">
			<a href="<?php echo base_url('/index.php/home/reservacion'); ?>" class="btn btn-success" style=" color:#852a1f; bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h5> Si tienes una reservación</h5>
					<h2>
						<font color='#f4d03f'>¡ingresa aquí!</font>
					</h2>
				</strong>
				<img src="<?php echo base_url() ?>image/reser.png" width="100" height="100" alt="https://www.flaticon.es/icono-gratis/programar_1497835">
			</a>
		</div>
		<div class="col p-3 salto" id="salto1">
			<a class="btn btn-success" href="<?php echo base_url('/index.php/cllBuzon/QuejasSugerencias'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
					<h5>¿Quieres dejarnos una <br></h5>
					<h3>
						<font color='#f4d03f'>queja o sugerencia?</font>
					</h3>
				</strong>
				<img src="<?php echo base_url() ?>image/buzon.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
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
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setInterval(function() {
			menos();
			mas();
			//opacidadTitulo();
		}, 3000);
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
	setInterval(
		function() {
			apacidadMas();
			apacidadMenos();
		}, 4000);

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
	setInterval(
		function() {
			incrementa();
			//decrementa();
		}, 3000);

	function incrementa() {
		$('.aumenta').animate({
			fontSize: '200%',
			lineHeight: '0px'
		}).animate({
			fontSize: '100%',
			lineHeight: '20px'
		});
	}
</script>

<!--probando git-->
