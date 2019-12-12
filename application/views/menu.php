<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style>
<!--<div class="pt-5 pl-2 font">
	<div class="card " style="width: 18rem;">
		<div class="card-header bg-dark text-white">
			<b> Lista de opciones.</b>
		</div>
		<div class="card-body">

		</div>
		<ul class="list-group list-group-flush">
			<a href="" class="btn btn-outline-dark">Gestionar Quejas y sugerencias</a>
			<a href="" class="btn btn-outline-dark">Gestionar Preguntas</a>
			<a href="" class="btn btn-outline-dark">Gestionar Respuestas.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Premios.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Buzon.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Gerencias.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Usuarios.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Encuestas.</a>
			<a href="" class="btn btn-outline-dark">Gestionar Felicitaciones.</a>
		</ul>
		<div class="card-footer bg-dark text-white">
			<br>
		</div>
	</div>
</div> -->
<?php // print_r($this->session->userdata);
//echo $this->session->userdata("logueado");
if ($this->session->userdata("logueado")) {

	?>
	<div class="container-fluid font">
		<center>
			<h1 class='text-white'> <b>
					<font color='#f4d03f'>Menu</font>
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
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllUser/result'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Ver <br></h5>
						<h3>
							<font color='#f4d03f'>Resultados.</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/resultados.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllBuzon/QuejasSugerencias'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <br></h5>
						<h3>
							<font color='#f4d03f'>Preguntas</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/preg.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllGerencias'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <br></h5>
						<h3>
							<font color='#f4d03f'>Gerencias</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/geren.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllFelicitaciones/getFelicitaciones'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <br></h5>
						<h3>
							<font color='#f4d03f'>Felicitaciones.</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/felicidad.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllBuzon/allBuzon'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <br></h5>
						<h3>
							<font color='#f4d03f'>Buzón de quejas y sugerencias.</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/buzon.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllPremios'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <br></h5>
						<h3>
							<font color='#f4d03f'>Premios.</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/auto.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('/index.php/cllUser'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar <h5></h5>
						<h3>
							<font color='#f4d03f'>Usuario</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/login.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
			<div class="p-3">
				<a class="btn btn-success" href="<?php echo base_url('index.php/cllBuzon/allClaves'); ?>" style="bottom:100px; height:200px; width:250px;"><strong style="color:aliceblue;">
						<h5>Gestionar</h5>
						<h3>
							<font color='#f4d03f'>Palabras clave</font>
						</h3>
					</strong>
					<img src="<?php echo base_url() ?>image/clave.png" width="100" height="100" alt="https://www.flaticon.es/autores/nhor-phai">
				</a>
			</div>
		</div>
	</div>
<?php
} else {
	echo "Swal.fire({ 
  icon: 'error',
  title: 'Uups...',
  text: 'No has iniciado sesión o no tienes acceso contacta al administrador. !'
});";
	redirect(base_url('index.php/cllUser/login'));
}
?>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/menu.js"></script>
