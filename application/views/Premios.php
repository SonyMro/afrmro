<style>
	.font {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
</style>
<div class="conteiner-fluid font"> <br>
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
					<br>
					<div class="form-group pt-2">
						<label for="firstname" class="col control-label">
							Nombre Stock:
						</label>
						<input type="text" class="form-control" name="txtStock" id="txtStock" placeholder="Peluche" required>
					</div>
					<div class="form-group">
						<label for="lastname" class="col control-label">
							Ingrese una descripción:
						</label>
						<textarea class="form-control" rows="3" name="txtDesc" id="txtDes" placeholder="Son los restaurantes" required></textarea>
					</div>
					<label for="exampleFormControlFile1"> Selecione foto:</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="txtImg" id="txtImg" lang="pl-Pl">
						<label class="custom-file-label" for="customFileLang"></label>
						<div id="preview" class="overflow-auto pt-1">
							<center>
								<img src="<? echo base_url() ?>image/imgUP.png" width="250" height="250" id="img1">
							</center>
						</div>
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
						<th>Stock</th>
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
								<td><?php echo $dato->IdPremio; ?></td>
								<td><?php echo $dato->Nombre; ?></td>
								<td><?php echo $dato->foto; ?></td>
								<td><?php echo $dato->Descripcion; ?></td>
								<td><?php echo $dato->Stock; ?></td>
								<td>
									<a type="button" class="btn btn-warning" id='<?php echo $dato->IdPremio; ?>' onclick="getFila(this)" data-toggle="modal" data-target="#myModal">
										<img src="<?php echo base_url() ?>image/edit.png" width="25" height="25"></a>
								</td>
								<td>
									<a type="button" class="btn btn-danger" id='<?php echo $dato->IdPremio; ?>' data-toggle="modal" data-target="#myModal">
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/premios.js"></script>
