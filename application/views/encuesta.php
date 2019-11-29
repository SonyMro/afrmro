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
	<h1 class="text-light  text-center aumenta">
		<font color='#FFF79F'> Evaluación de servicio.</font>
	</h1>
	<br>
	<div class='row'>
		
		<br>
		<?php
		if ($preguntas != null) {

			$tamano = count($preguntas->result());
			$aux = 0;
			$arreglo = array();
			$contador = 0;

			foreach ($preguntas->result() as $pregunta) {
				if ($pregunta->IdSecion != $aux) {
					cards($arreglo);
					$aux = $pregunta->IdSecion;
					if ($pregunta->IdSecion == $aux) {
						$arreglo = new ArrayObject(array($pregunta));
					} else { }

					?><?php ?>
	<?php
			} else {

				$arreglo->append($pregunta);
			}
			$contador++;
			if ($tamano == $contador) {
				cards($arreglo);
			}
			?>

<?php
	}
} else {
	echo '<div class="alert alert-danger" role="alert"> Error no hay datos</div>';
}
function cards($grupo)
{
	//arsort($grupo, $grupo[0]->numero);
	//uasort($grupo, $grupo[0]->numero);
	?>
<br>
<form id="form1">
	<?php
		if (!empty($grupo)) {
			?>
		<div class="col-sm-12 pt-5">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h3><?php echo $grupo[0]->NombreSecion; ?></h3>
				</div>
				<div class="card-body">
					<?php
							//	print_r($grupo);
							foreach ($grupo as $key => $value) {
								//	echo $key . ' -> ' . $value . '<br>';
								switch ($value->tipo) {
									case 'abierta':

										?>
								<div class="form-group row ">
									<h5 class="col-sm-4"><?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?></h5>
									<div class="col-sm-8 brillo" id="lbl<?php echo $value->IdPregunta; ?>" onclick="eliminarEfecto(this);">
										<input type="text" name="Abierta<?php echo $value->IdPregunta; ?>" class="form-control pl-5">
										<input type="text" name="IdPregunta<?php echo $value->IdPregunta; ?>" style="display: none;" value="<?php echo $value->IdPregunta ?>">
									</div>
								</div>
							<?php
											break;
										case 'likert':

											?>
								<div class="form-group">
									<h5 for="">
										<?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?>
									</h5><br />
									<div class="btn-group btn-group-toggle brillo" data-toggle="buttons" id="lbl<?php echo $value->IdPregunta; ?>" onclick="eliminarEfecto(this);">
										<label class="btn btn-secondary active">
											<input type="radio" name="likert<?php echo $value->IdPregunta; ?>" value="5" id="option1" onblur="subPreguntasLikert(this,'<?php echo $value->subpregunta; ?>','<?php echo $value->IdPregunta; ?>');" autocomplete="off">
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" name="likert<?php echo $value->IdPregunta; ?>" value="4" id="option2" onblur="subPreguntasLikert(this,'<?php echo $value->subpregunta; ?>','<?php echo $value->IdPregunta; ?>');" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" name="likert<?php echo $value->IdPregunta; ?>" value="3" id="option3" onblur="subPreguntasLikert(this,'<?php echo $value->subpregunta; ?>','<?php echo $value->IdPregunta; ?>');" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" name="likert<?php echo $value->IdPregunta; ?>" value="2" id="option4" onblur="subPreguntasLikert(this,'<?php echo $value->subpregunta; ?>','<?php echo $value->IdPregunta; ?>');" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" name="likert<?php echo $value->IdPregunta; ?>" value="1" id="option" onblur="subPreguntasLikert(this,'<?php echo $value->subpregunta; ?>','<?php echo $value->IdPregunta; ?>');" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
										<input type="text" name="IdPregunta<?php echo $value->IdPregunta; ?>" style="display: none;" value="<?php echo $value->IdPregunta ?>">
									</div>
									<div id="div<?php echo $value->IdPregunta; ?>">

									</div>
								</div>
							<?php
											break;

										case 'sino':
											?>
								<div class="form-group ">
									<h5 for="inputPassword6">
										<?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?>
									</h5><br />
									<div class="brillo" id="lbl<?php echo $value->IdPregunta; ?>" onclick="eliminarEfecto(this);">
										<label class="radio-inline h5 pr-2"><input type="radio" name="sino<?php echo $value->IdPregunta; ?>" value="si" checked>Si</label>
										<label class="radio-inline h5 pr-2"><input type="radio" name="sino<?php echo $value->IdPregunta; ?>" value="no">No</label>
										<input type="text" name="IdPregunta<?php echo $value->IdPregunta; ?>" style="display: none;" value="<?php echo $value->IdPregunta; ?>">
									</div>
								</div>
							<?php
											break;
										case 'esperaba': ?>
								<div class="form-group">
									<h5 for="inputPassword6">
										<?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?>
									</h5><br />
									<div class="brillo" id="lbl<?php echo $value->IdPregunta; ?>" onclick="eliminarEfecto(this);">
										<label class=" radio-inline h5 pr-2"><input type="radio" name="esperaba<?php echo $value->IdPregunta ?>" value="MEJOR DE LO QUE ESPERABA" checked>MEJOR DE LO QUE ESPERABA.</label>
										<label class="radio-inline h5 pr-2"><input type="radio" name="esperaba<?php echo $value->IdPregunta ?>" value="TAL COMO LO ESPERABA.">TAL COMO LO ESPERABA.</label>
										<label class="radio-inline h5 pr-2"><input type="radio" name="esperaba<?php echo $value->IdPregunta ?>" value="PEOR DE LO QUE ESPERABA.">PEOR DE LO QUE ESPERABA.</label>
										<input type="text" name="IdPregunta<?php echo $value->IdPregunta; ?>" style="display: none;" value="<?php echo $value->IdPregunta ?>">
									</div>
								</div>
							<?php
											break;
										case 'abiertalarga': ?>
								<div class="form-group">
									<h5 for="inputPassword6">
										<?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?>
									</h5><br />
									<div class="brillo" id="lbl<?php echo $value->IdPregunta; ?>" onclick="eliminarEfecto(this);">
										<textarea class="form-control" name="AbiertaLarga<?php echo $value->IdPregunta; ?>" rows="3"></textarea>
										<input type="text" name="IdPregunta<?php echo $value->IdPregunta; ?>" style="display: none;" value="<?php echo $value->IdPregunta ?>">
									</div>
								</div>
							<?php
											break;
										default:
											?>
								<div class="form-group">
									<h5 for="inputPassword6">
										<?php echo $value->IdPregunta . ' ' . $value->Pregunta; ?>
									</h5><br />
								</div>
							<?php
											break;
									}
									?>

						<?php
									//	echo $value->IdSecion;
									//echo $value->Pregunta;
								}
								/////////////////////////////////////////////////////////////////
								?>
				</div>
				<div class="card-footer text-muted bg-dark">
					<br>
				</div>
			</div>
		</div>
		<br>

<?php
	} else {
		echo '<br/>';
	}
}
?>
<center>
	<div class="form-group pl-3 pr-2">
		<button type="button" onclick="getFormData('form1')" class="btn btn-success bg btn-block">
			<h2>ENVIAR RESPUESTAS.</h2>
		</button>
	</div>
</center>
<br>
</form>

	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/encuesta.js"></script>
