<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style>
<div class="container font">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUser">
		Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="row">
			<div class="col"></div>
			<div class="col">

				<div class="col border border-success p-5 text-light rounded" style="background-color: #514939;">
					<button type="button" onclick='cerrarModal()' class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<center>
						<h2> <b>Iniciar Sesión</b></h2>
						<img src="<?php echo base_url(); ?>image/login.png" alt="https://www.flaticon.com/free-icon/password_2181144#term=login&page=1&position=59" srcset="" width="200" height="200">
					</center>
					<form action="<?php echo site_url('/cllUser/login'); ?>" method="POST">
						<div class="form-group">
							<h3 for="exampleInputEmail1">Ingrese Correo:</h3>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

						</div>
						<div class="form-group">
							<h3 for="exampleInputPassword1">Ingrese Contraseña:</h3>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<center>
							<button type="submit" class="btn btn-dark btn-lg btn-block">Entrar</button>

						</center>
					</form>
				</div>
			</div>
			<div class="col"></div>
		</div>

	</div>
</div>
