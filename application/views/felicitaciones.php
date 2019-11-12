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
	<p class="h1 text-center text-light display-4 brillo">
		<font color="#FFE98F"><b>!!!FELICITACIONES¡¡¡</b></font>
	</p><br>
	<div class="row">
		<!--
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 pt-2 pl-3 pr-5"> Se adapta a la cualquier dispositivo
			<div class="card text-white bg-dark" style="width: 18rem;">
				<div class="card-header">
					<br>
				</div>
				<img src="<?php echo base_url() ?>image/africam.png" width="150px" height="150px" class="card-img-top">
				<div class="card-body">
					<h5 class="card-title">Opciones</h5>
					<div class="list-group">
						
								</div> </div> <div class="card-footer text-muted">
										<br>
					</div>
				</div>
			</div>-->
		<div class="col">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h2> RECOMENDACIONES.</h2>
				</div>
				<div class="card-body">
					<h5 class="card-title brillo2">RECOMIÉNDANOS</h5>
					<h5 class="card-text brillo2">TE GUSTARÍA RECOMENDARNOS EN TRIPADVISOR</h5>
					<a href="https://www.tripadvisor.com.mx/Attraction_Review-g152773-d2538696-Reviews-Africam_Safari-Puebla_Central_Mexico_and_Gulf_Coast.html" class="">
						<img src="<?php echo base_url() ?>image/TA_logo.png" alt="" width="200px" height="40px"></a>
				</div>
				<div class="card-footer text-muted bg-dark">
					<br>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h3 class="">ESCRIBE TU FELICITACIÓN.</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title brillo2">¿QUÉ FUE LO QUE MÁS LE GUSTO DE SU VISITA A AFRICAM SAFARI?</h5>
					<form action="<?php echo site_url('/cllFelicitaciones/insertarfel'); ?>" method="POST">
						<div class="form-group">
							<div class="mb-3">
								<textarea class="form-control inputFont" name='txthappy' id="txthappy" placeholder="Eje. Me gusto el recorrido, me divertí mucho. " id="txthappy" rows="5" Onblur="validarCampo(this.value)" required></textarea>
								<div class="" id='val'>
								</div>
							</div>
						</div>
				</div>
				<button type="submit" class="btn btn-dark btn-lg btn-block">Listo</button>
				</form>
			</div>

		</div>

	</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/felicitaciones.js"></script>
