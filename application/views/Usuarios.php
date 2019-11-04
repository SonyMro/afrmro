<div class="conteiner-fluid">
	<center>
		<h2 class="text-white"><strong> Lista de usuarios:</strong> </h2>
	</center>
	<br>

	<div class="row">
		<div class="col-4 pl-4">
			<div class="card " style="width: 25rem;">
				<div class="card-header bg-dark text-white">
					<b> Registrar Usuario:</b>
				</div>
				<div class="card-body">
					<form action="<?php echo site_url('/cllUser/registrarUser'); ?>" method="POST">
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Nombre:
							</label>
							<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Juanito" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Aperllido Paterno:
							</label>
							<input type="text" class="form-control" name="txtApepat" id="txtApepat" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Aperllido Materno:
							</label>
							<input type="text" class="form-control" name="txtApemat" id="txtApemat" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Correo:
							</label>
							<input type="email" class="form-control" name="txtMail" id="txtMail" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								COntraseña:
							</label>
							<input type="password" class="form-control" name="txtPass" id="txtPass" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Verifique Contraseña:
							</label>
							<input type="password" class="form-control" name="txtPassV" id="txtPassV" required>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Seleccione Gerencia:
							</label>
							<select name="slgerencias" id="" class="form-control">
								<option value="">Elige una opcion</option>
								<?php
								if ($gerencias != null) {
									foreach ($gerencias->result() as $gerencia) {
										echo $gerencia->Nombre;
										?>
										<option value="<?php echo $gerencia->IdGerencia; ?>"><?php echo $gerencia->Nombre; ?></option>
								<?php
									}
								} else {
									echo 'No hay datos';
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="firstname" class="col control-label">
								Seleccione Rol:
							</label>
							<select name="slRol" id="" class="form-control">
								<option value="">Elige una opcion</option>
								<?php

								if ($roles != null) {
									foreach ($roles->result() as $rol) {
										?>
										<option value="<?php echo $rol->IdRol; ?>"><?php echo $rol->RolUser; ?></option>
								<?php
									}
								} else {
									echo 'No hay datos';
								}
								?>
							</select>
						</div>
						<br>
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
		<div class="col-7">
			<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>ID.</th>
						<th>Nombre.</th>
						<th>Apelidos</th>
						<th>Correo</th>
						<th>Gerencia</th>
						<th>Rol</th>
					</tr>
				</thead>
				<tbody class="table-light" id="tblUsuers">

				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/usuarios.js"></script>
