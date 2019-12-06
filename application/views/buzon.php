<div class="container-fluid">

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<?php // print_r($buzon);
			foreach ($buzon as $b) {
				?>

				<div class="card text-center">
					<div class="card-header bg-dark text-white">
						<ul class="list-inline">
							<li id="<?php echo $b->IdBuzon; ?>">
								<h2><?php echo $b->Nombre . ' ' . $b->apellidos; ?></h2>
							</li>
						</ul>
					</div>
					<div class="card-body ">
						<div class="form-row border border-success rounded text-white" style="background-color: #514939;">
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Edad:</h4>
										<h4><?php echo $b->Edad; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Correo:</h4>
										<h4><?php echo $b->correo; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Telefono:</h4>
										<h4><?php echo $b->telefono; ?></h4>
									</li>
								</ul>
							</div>
						</div>

						<div class="form-row border border-success rounded text-white" style="background-color: #514939;">
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Dirección:</h4>
										<h4><?php echo $b->direccion; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Código postal: </h4>
										<h4><?php echo $b->codigoPostal; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Fecha:</h4>
										<h4><?php echo $b->fecha; ?></h4>
									</li>
								</ul>
							</div>
						</div>
						<div class="form-row border border-success rounded text-white" style="background-color: #514939;">
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Recorrido:</h4>
										<h4><?php echo $b->Recorrido; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li>
										<h4>Recomendación: </h4>
										<h4><?php echo $b->Recomendaccion; ?></h4>
									</li>
								</ul>
							</div>
							<div class="col-sm-3 col-md-4 col-lg-4">
								<ul class="list-inline">
									<li id="<?php echo $b->IdGerencia; ?>">
										<h4>Gerencia:</h4>
										<h4><?php echo $b->gerencia; ?></h4>
									</li>
								</ul>
							</div>
						</div>
						<div class="form-row border border-success rounded text-white" style="background-color: #514939;">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<ul class="list-inline">
									<li>
										<h4>Queja o sugerencia:</h4>
										<h4><?php echo $b->comentarios; ?></h4>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-footer bg-dark">
						<br>
					</div>
				</div> <br>
			<?php
			}
			?>
		</div>
	</div>
</div>
</div>
