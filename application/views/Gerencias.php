<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style><br>
<div class="conteiner-fluid font">
	<center>
			<h2 class="text-white"> <b> Lista de Gerencias</b></h2>		
	</center> <br>
	<div class="row">
		<div class="col-3 pl-4">
			<div class="font">
				<div class="card" style="width: 20rem;">
					<div class="card-header bg-dark text-white">
						<b> Registrar Gerencias:</b>
					</div>
					<div class="card-body">
						<form action="<?php echo site_url('/cllGerencias/insertGerencia'); ?>" method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="firstname" class="col control-label">
									Ingrese nombre Gerencia:
								</label>
								<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Apg" required>
							</div>
							<div class="form-group">
								<label for="lastname" class="col control-label">
									Ingrese una descripción:
								</label>
								<textarea class="form-control" rows="3" name="txtDesc" id="txtDes" placeholder="Son los restaurantes" required></textarea>
							</div>
							<center>
								<button type="submit" class="btn btn-success btn-lg btn-block">Registrar</button>
							</center>
						</form>
					</div>
					<div class="card-footer bg-dark text-white">
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-8">
			<table class="table table-striped table-hover p-5">
				<thead class="thead-dark">
					<tr>
						<th>ID.</th>
						<th>Nombre.</th>
						<th>Descripción.</th>
						<th>Opciones.</th>
						<th></th>
					</tr>
				</thead>
				<tbody class="table-light">
					<?php if ($datos != null) {
						?>
						<?php
							foreach ($datos->result() as $dato) {
								?>
							<tr class="boton">
								<td><?php echo $dato->IdGerencia; ?></td>
								<td><?php echo $dato->Nombre; ?></td>
								<td><?php echo $dato->Descripcion; ?></td>
								<td>
									<a type="button" class="btn btn-warning" id='<?php echo $dato->IdGerencia; ?>' onclick="getFila(this)" data-toggle="modal" data-target="#myModal">
										<img src="<?php echo base_url() ?>image/edit.png" width="25" height="25"></a>
								</td>
								<td>
									<a type="button" class="btn btn-danger" id='<?php echo $dato->IdGerencia; ?>' data-toggle="modal" data-target="#myModal">
										<img src="<?php echo base_url() ?>image/delete.png" width="25" height="25"></a>
								</td>
							<?php } ?>
							</tr>
						<?php
						} else {
							?>
							<div class="alert alert-warning">No hay datos.</div>
						<?php
						} ?>
				</tbody>
			</table>
		</div>

	</div>
</div>
<!-- Button trigger modal -->

<!-- modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 25rem;">
			<div class="card" style="width: 25rem;">
				<div class="card-header bg-dark text-white">
					<b>Información de gerencia:</b>
				</div>
				<div class="card-body">
					<form action="<?php echo site_url('/cllGerencias/modificarGerencia'); ?>" method="POST" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="firstname" class="col control-label">
								ID:
							</label>
							<input type="text" class="form-control" name="txtIdG" id="txtIdG" name="txtIdG" readonly>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Ingrese nombre Gerencia:
							</label>
							<input type="text" class="form-control" name="txtNombreM" id="txtNombreM" placeholder="Apg" required>
						</div>
						<div class="form-group">
							<label for="lastname" class="col control-label">
								Ingrese una descripción:
							</label>
							<textarea class="form-control" rows="3" name="txtDesM" id="txtDesM" placeholder="Son los restaurantes" required></textarea>
						</div>
						<center>

							<button type="submit" onclick="alerta();" class="btn btn-warning btn-lg btn-block">Actualizar</button>
						</center>
					</form>
				</div>
				<div class="card-footer bg-dark text-white">
					<br>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/gerencias.js"></script>
