<div class="container-fluid">
	<center>
		<h1>
			<font color='#FFF79F'>Lista de palabras clave para buzón.</font>
		</h1>
	</center> <br>
	
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<br>
				</div>
				<div class="card-body ">
					<form action="<?php echo site_url('/cllBuzon/inserclave'); ?>" method="POST">
						<div class="form-group">
							<h4 for="exampleFormControlInput1">Ingrese palabra</h4>
							<input type="text" class="form-control" name="txtPal" id="txtpal" placeholder="Comida">
						</div> <br>
						<div class="form-group">
							<h4 for="exampleFormControlInput1">Selecione gerencia:</h4>
							<select class="form-control" name="sGerencia">
								<option>Default select</option>
								<?php
								//	print_r($geren);
								foreach ($geren as $g) {
									?>
									<option value="<?php echo $g->IdGerencia; ?>"><?php echo $g->Nombre; ?></option>
								<?php
								}
								?>

							</select>
						</div>
						<center> <button class="btn btn-success btn-lg btn-block" type="submit"> Registrar</button></center>
					</form>

				</div>
				<div class="card-footer bg-dark">
					<br>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-8">
			<table class="table table-hover table-sm">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Palabra Clave</th>
						<th>Gerencia</th>
						<th>IdGerencia</th>
						<th>Opcion</th>
					</tr>
				</thead>
				<tbody class="table-light" id="tblclaves">
					<?php foreach ($claves as $clave) {
						?>
						<tr>
							<th><?php echo $clave->idbc; ?></th>
							<th><?php echo $clave->palabra; ?></th>
							<th><?php echo $clave->IdGerencia; ?></th>
							<th><?php echo $clave->Nombre; ?></th>
							<th>
								<button class="btn btn-danger" onclick="fila('<?php echo $clave->idbc; ?>','<?php echo $clave->palabra; ?>','<?php echo $clave->Nombre; ?>');">Eliminar</button>
							</th>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalClave" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-dark text-white">
				<h5 class="modal-title" id="exampleModalLongTitle">Editar Palabra clave:</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('/cllBuzon/eliminarClave'); ?>" method="post">
					<div class="form-group">
						<h4>ID:</h4>
						<input type="text" class="form-control" id="txtid" name="txtid" readonly>
					</div> <br>
					<div class="form-group">
						<h4>Palabra:</h4>
						<input type="text" class="form-control" id="txtpalE" readonly>
					</div> <br>
					<div class="form-group">
						<h4>Gerencia:</h4>
						<input type="txt" id="txtGeren" class="form-control" readonly>
					</div>
					<center> <button class="btn btn-danger btn-lg btn-block" type="submit"> Eliminar</button></center>
			</div>
			</form>

		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		console.log('jjajajajaja');
	});

	function fila(id, palabra, gerencia) {
		$("#txtid").val(id);
		$("#txtpalE").val(palabra);
		$('#txtGeren').val(gerencia);
		$("#modalClave").modal('show');
	}
</script>
