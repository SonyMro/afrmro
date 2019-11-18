<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style>
<div class="conteiner-fluid font"> <br>
	<div>

	</div>
	<center>
		<h2 class="text-white"><b>Lista de Premios </b></h2>
	</center>
	<div class="row">
		<div class="col-4 pl-4">
			<div class="card " style="width: 25rem;">
				<div class="card-header bg-dark text-white">
					<b> Registrar Premio:</b>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="firstname" class="col control-label">
							Nombre del Premio:
						</label>
						<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Peluche" required>
					</div>
					<div class="form-group">
						<label for="lastname" class="col control-label">
							Ingrese una descripción:
						</label>
						<textarea class="form-control" rows="3" name="txtDesc" id="txtDes" placeholder="Peluche en forma de tigre" required></textarea>
					</div>
					<label> Selecione foto:</label>
					<input type="file" class="form-control" id="file-input" accept="image/*"> <br>
					<div id="preview" class="overflow-auto pt-1">
						<img src="" alt="" id="fire" width="100" height="100">
					</div>
					<br>
					<center>
						<button type=" submit" class="btn btn-success btn-lg btn-block" onclick="insertar()">Registrar</button>
					</center>
				</div>
				<div class="card-footer bg-dark text-white">
					<br>
				</div>
			</div>
		</div>
		<div class="col-7">
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>ID.</th>
						<th>Nombre.</th>
						<th>Imagen</th>
						<th>Descripción.</th>
						<th>Opciones.</th>
						<th></th>
					</tr>
				</thead>
				<tbody class="table-light" id="tblPremios">

				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card " style="width: 30rem;">
					<div class="card-header bg-dark text-white">
						<b> Modificar Premio:</b>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="firstname" class="col control-label">
								ID:
							</label>
							<input type="text" class="form-control" id="txtIdM" placeholder="Peluche" readonly>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Nombre del Premio:
							</label>
							<input type="text" class="form-control" name="txtNombreM" id="txtNombreM" placeholder="Peluche" required>
						</div>

						<div class="form-group">
							<label for="lastname" class="col control-label">
								Ingrese una descripción:
							</label>
							<textarea class="form-control" rows="3" name="txtDesc" id="txtDesM" placeholder="Peluche en forma de tigre" required></textarea>
						</div>
						<label> Selecione foto:</label>
						<input type="file" class="form-control" id="txtImgM" accept="image/*"> <br>
						<div id="preview" class="overflow-auto pt-1">
							<img src="" width="100" height="100" id="img1M">
						</div>
						<br>
					</div>
					<div class="card-footer bg-dark text-white">
						<div class="row">
							<div class="col-4">
								<button type="button" class="btn btn-danger btn-lg btn-block" onclick="Eliminar()">Eliminar</button>
							</div>
							<div class="col-4">
								<button type="button" class="btn btn-warning btn-lg btn-block" onclick="modificar()" >Actualizar</button>
							</div>
							<div class='col-4'>
								<button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/premios.js"></script>
