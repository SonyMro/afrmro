<style>
	table {
		border-collapse: collapse;
		border-radius: 1em;
		overflow: hidden;
	}
</style>

<div class='container'>
	<p class="h6 text-center text-light display-4">
		<b> Lista de Quejas y sugerencias</b>
	</p><br>
	<div class="row">
		<table class="table table-striped table-hover table-sm">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Correo</th>
					<th>Telefono</th>
					<th>Fecha</th>
					<th>Recorrido</th>
					<th>Recomendacion</th>
					<th>Comentarios</th>
					<th>Gerencia</th>
					<th><a href="" class="btn btn-info"></a></th>
				</tr>
			</thead>
			<tbody class="table-light">
				<?php foreach ($listaBuzon->result() as $dato) {
					?>
					<tr>
						<td><?php echo $dato->IdBuzon; ?></td>
						<td><?php echo $dato->Nombre; ?></td>
						<td><?php echo $dato->Edad; ?></td>
						<td><?php echo $dato->correo; ?></td>
						<td><?php echo $dato->telefono; ?></td>
						<td><?php echo $dato->fecha; ?></td>
						<td><?php echo $dato->Recorrido; ?></td>
						<td><?php echo $dato->Recomendaccion; ?></td>
						<td><?php echo $dato->comentarios; ?></td>
						<td><?php echo $dato->IdGerencia; ?></td>
						<td><a class="btn btn-info">Ver detalles</a></td>
					<?php } ?>
					</tr>
			</tbody>
		</table>
	</div>
</div>
