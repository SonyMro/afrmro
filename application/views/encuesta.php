<style>
	.font {
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
	}
</style>

<div class="container-fluid font">
	<h1 class="text-light  text-center aumenta">
		<font color='#FFF79F'> Evaluación de servicio.</font>
	</h1>
	<br>
	<div class='row'>
		<div class="col-sm-12 pb-4" id="sec-1">
			<div class="card text-center">
				<div class="card-header bg-dark">
					<br>
				</div>

				<div class="card-body ">
					<h5 class="card-title">
						BUSCAR NÚMERO DE RESERVACIÓN.
					</h5>
					<div class="form-group">
						<input type="text" class="form-control">
					</div>
					<button class="btn btn-success pl-5 pr-5" onclick="BuscarReserva()">
						BUSCAR
					</button>
				</div>
				<div class="card-footer bg-dark">
					<br>
				</div>
			</div>
		</div>
		<div class="col-sm-12" id="sec-2">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<h2> INFORMACIÓN DE RESERVACIÓN.</h2>
				</div>
				<div class="card-body row pl-0">
					<div class="form-inline float-sm-right pl-5">
						<h4>FECHA:</h4> <br>
						<h5 class="pl-2">31/10/2019</h5>
					</div>
					<div class="col-12 pb-5">
						<h2>¿ES TU INFORMACIÓN?</h2>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NOMBRE DEL RESPONSABLE.</h4>
						<h5 id="">Text</h5>
					</div>
					<div class="col-6 p-1">
						<h4>INSTITUCIÓN/GRUPO.</h4>
						<h5 id="">Text</h5>
					</div>
					<br />

					<br />
					<div class="col-6 p-1">
						<h4>CORREO.</h4>
						<h5 id="">Text</h5>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO ADULTOS.</h4>
						<h5 id="">Text</h5>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>NUMERO NIÑOS</h4>
						<h5 id="">Text</h5>
					</div>
					<br />
					<div class="col-6 p-1">
						<h4>SERVICIOS.</h4>
						<h5 id="">Text</h5>
					</div>
					<div class="col-12 form-inline float-sm-right pt-2 pb-2">
						<h4 class="pl-3 pr-2">¿ES LA PRIMERA VEZ QUE HA VISITADO AFRICAM SAFARI? </h4> <br>
						<h5 class="radio-inline"><input type="radio" name="optradio1" id='rdop2n' value="bus africamion" required>SI
						</h5>
						<h5 class="radio-inline"><input type="radio" name="optradio1" id='rdop2n' value="bus africamion" required>NO
						</h5>
					</div>
					<div class="col-6 pr-5">
						<button class="btn btn-success btn-lg btn-block" onclick="siReser()">
							SI ES MI INFORMACIÓN.
						</button>
					</div>
					<div class="col-6">
						<button class="btn btn-danger btn-lg btn-block" onclick="noReser()">
							NO ES MI INFORMACIÓN.
						</button>
					</div>
				</div>
				<div class="card-footer text-muted bg-dark text-white">
					<br>
				</div>
			</div>
		</div>
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
<!--<div class="row">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 pl-3">
			
			<div class="card text-white bg-dark" style="width: 18rem;">
				<div class="card-header">
					<br>
				</div>
				<div class="card-body">
					<div class="list-group">
						<a type="button" class="btn  btn-secondary" href="<?php echo base_url(); ?>">
							<h5> ◄ Regresar </h5>
						</a> <br>
					</div>
					<div class="card" id="cardInfo" style="width: 15rem;">
						<div class="card-body">
							<h5 class="card-title text-dark ">Mi información</h5>
							<p class="card-text ">
								<br />
								<div class="text-dark">
									<h6><b>Fecha.</b></h6>
									<h6>31/10/2019</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>Institución/Grupo.</b></h6>
									<h6 id="">Text</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>Responsable.</b></h6>
									<h6 id="">Text</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>Mail.</b></h6>
									<h6 id="">Text</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>No. Adultos.</b></h6>
									<h6 id="">Text</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>No. niños.</b></h6>
									<h6 id="">Text</h6>
								</div>
								<br />
								<div class="text-dark">
									<h6><b>SERVICIOS.</b></h6>
									<h6 id="">Text</h6>
								</div>
							</p>
						</div>
					</div>
				</div>
				<div class="card-footer text-muted">
					<br>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-9  pl-5 pr-3">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<br>
				</div>
				<div id="comp1s">
					<div class="card-body">
						<h5 class="card-title ">¿Tienes reservación?
						</h5>
						<button type="button" class="btn btn-success btn-lg " id="btnc1rs1">Si</button>
						<button type="button" class="btn btn-warning  btn-lg" id="btnc1rn1">No</button>
					</div>
				</div>
				<div id="comp2s">
					<div class="card-body">
						<div id="compBuscar">
							<h5 class="card-title ">Ingrese el número de reservación</h5>
							<div class="form-group  pr-4 ">
								<input type="password" id='txtNumReservacion' class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
							</div>

							<button type="button" class="btn btn-success" style="height:40px; width:180px;" id="btnBuscarReserv">Buscar</button>
						</div>
						<div id="subcomp1s">
							<fieldset>
								<div class="form-group">
									<h3 for="inputPassword6"> 
											1. Durante la reservación, ¿te ofrecieron algún servicio educativo?
									</h3><br />
									<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1s' value="si">Si</label>
									<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1n' value="no">No</label>
								</div>
							</fieldset>
							<fieldset>
								<div class="form-group">
									<h3 for="inputPassword6">
										2. Durante la reservación, ¿te ofrecieron el servicio de alimentos?
									</h3><br />
									<h3 class="radio-inline"><input type="radio" name="optradio2" id='rdop2s' value="si">Si</h3>
									<h3 class="radio-inline"><input type="radio" name="optradio2" id='rdop2n' value="no">No</h3>
								</div>
							</fieldset>
							<div id="subsubcomp1s">
								<div class="form-group">
									<h3 for="inputPassword6">
										3. ¿Cuál fue el motivo?
									</h3><br />
									<input type="text" class="form-control" id="" placeholder="">
								</div>
							</div>
							<fieldset>
								<div class="form-group">
									<h3 for="">
										4. ¿Cómo fue tu experiencia con la resevación?
									</h3><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
							</fieldset>
							<div class="col-sm-12 pl">
								<button class="btn btn-success " id="btnenv1c2ss1" style="height:40px; width:180px;">Enviar</button>
							</div>
						</div>

					</div>
				</div>
				<div id="comp3n">
					<div class="card-body">
						<h5 class="card-title ">
							Selecciona los servicios que tuviste:
						</h5>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input noReservacion" id="customCheck1" onclick="noreservacion(this)" value="guia" />
							<label class="custom-control-label" for="customCheck1">
								Guía/Operador guía.
							</label>
						</div><br>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input noReservacion" id="customCheck2" onclick="noreservacion(this)" value="Autobús contratado por Africam." />
							<label class="custom-control-label" for="customCheck2">
								Autobús contratado por Africam. </label>
						</div> <br>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input noReservacion" id="customCheck3" onclick="noreservacion(this)" value="Servicio educativo" />
							<label class="custom-control-label" for="customCheck3">
								Servicio educativo.
							</label>
						</div> <br>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input noReservacionNinguno" id="customCheck4" onclick="noreservacion(this)" value="Ninguno" />
							<label class="custom-control-label" for="customCheck4">
								Ninguno.</label>
						</div>
						<div class="pt-2">
							<button type="button" class="btn btn-success" style="height:40px; width:250px;" id="env1c3n">Registrar</button>
						</div>
					</div>
				</div>
				<div id="comp4s">
					<div class="card-body">
						<h5 class="card-title ">
							Tu recorrido safari tuvo:
						</h5>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input checar" id="Check1" value="guia" onclick="Guias(this)">
							<label class="custom-control-label" for="Check1">Guia</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input checar" id="Check2" value="operador guia" onclick="Guias(this)">
							<label class="custom-control-label" for="Check2">Operador Guia</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input checar" id="Check3" value="no tuvo" onclick="Guias(this)">
							<label class="custom-control-label" for="Check3">Ninguno</label>
						</div>
					</div>
				</div> <br>
				<div id="guia" class="pl-3 pr-2">
					<div class="form-row text-center ">
						<div class="col-sm-10 pl-2">
							<label for="txtNombreGuia">Ingrese el nombre del Guia: </label>
							<input type="text" class="form-control" id='txtNombreGuia'>
						</div>
					</div> <br>
					<label for="">¿Qué tan satisfactoria fue la atención del guía?
					</label>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active">
							<input type="radio" name="optGuia" id="option1Guia" autocomplete="off" checked> Active
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="optGuia" id="option2Guia" autocomplete="off"> Radio
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="optGuia" id="option3Guia" autocomplete="off"> Radio
						</label>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="inputPassword6">
								Todas las preguntas que tú y tu grupo realizaron,
								¿fueron contestadas correctamente?
							</label><br />
							<label class="radio-inline"><input type="radio" name="optradioG" id='rdopnsi' value="si">Si</label>
							<label class="radio-inline"><input type="radio" name="optradioG" id='rdopnno' value="no">No</label>
						</div> <br>
						<div class="pt-2">
							<button type="button" class="btn btn-success" style="height:40px; width:250px;" id="btnenv1c4s">Enviar</button>
						</div>
					</div>
				</div>
				<div id="comp5">
					<div class="card-body">
						<h5 class="card-title ">
							¿Que servicios adicionales tuvo?
						</h5>
						<br>
						<div class="pl-3 pr-3">
							<button class="btn btn-dark" id="btnBusContratado">Autobús contratado. ▼
							</button></div>
						<div id="busContratado">
							<fieldset style="border:1px solid black">
								<div class="form-group">
									<label for="">
										1. ¿Qué tan satisfactoria fue la atención y la actitud del chofer?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div> <br>
								<div class="form-group">
									<label for="">
										2. ¿Qué tan adecuada fue la forma de conducir del chofer?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="">
										3. ¿Qué tan correctamente el chofer portaba el uniforme?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
							</fieldset>
						</div> <br>
						<div class="pl-3 pr-3">
							<button class="btn btn-dark" id="btnservicioEducativo">Servicio educativo.
								▼
							</button></div>
						<div id="servicioEducativo">
							<fieldset style="border:1px solid black">
								<div class="form-group">
									<label for="">
										1. ¿Qué tan satisfactorio fue el desempeño del instructor-a del servicio educativo?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div> <br>
								<div class="form-group">
									<label for="">
										2. ¿Qué tan adecuadas son las instalaciones donde se impartió el servicio educativo?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="">
										3. ¿El servicio educativo te pareció un apoyo didáctico para los contenidos que está ejecutando o ejecutará en la currícula?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label for="">
										4. ¿El contenido del servicio educativo fue adecuado para el nivel y edad de los participantes?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label for="">
										5. ¿Recomendarías el servicio educativo?
									</label><br />
									<br />
									<label class="radio-inline"><input type="radio" name="optradio1" id='ReSerEdurdop1s' onclick="ReSerEdu(this);" value="si">Si</label>
									<label class="radio-inline"><input type="radio" name="optradio1" id='ReSerEdurdop1n' onclick="ReSerEdu(this);" value="no">No</label>
									<div id="ReSerEduSi">
										<div class="form-group pl-2 pr-2">
											<label for="exampleFormControlInput1">En el siguiente espacio escribe el (los) tema (s) que te gustaría se abordaran en los servicios educativos de Africam Safari:
											</label>
											<input type="email" class="form-control" id="txtTemaAdd" placeholder="Ejemplo conservación de animales">
										</div>
										<div class="pl-3">
											<button class="btn btn-success" style="height:40px; width:250px;" id="btnTemas">Agregar</button>
										</div>
										<div id='temasEduAgregados' class="p-2">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<br>
						<div class="pl-3 pr-3">
							<button class="btn btn-dark" id="btnalimentosContratados">Alimentos contratados. ▼
							</button></div>
						<div id="alimentosContratados">
							<fieldset style="border:1px solid black">
								<div class="form-group">
									<label for="">
										1. ¿El servicio de alimentos se entregó a tiempo?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div> <br>
								<div class="form-group">
									<label for="">
										2. ¿El servicio de alimentos cumplió con las características de lo contratado?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<br>
								<div class="form-group">
									<label for="">
										3. ¿La calidad/sabor de los alimentos fue bueno?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label for="">
										4. ¿El personal que te ofreció el servicio de alimentos fue amable?
									</label><br />
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-secondary active">
											<input type="radio" id="option1" autocomplete="off" checked>
											<h1>&#128532;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option2" autocomplete="off">
											<h1>&#128528;</h1>
										</label>
										<label class="btn btn-secondary">
											<input type="radio" id="option3" autocomplete="off">
											<h1>&#128525;</h1>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label for="">
										5. ¿Recomendarías el servicio de alimentos contratados?
									</label><br />
									<br />
									<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1s' value="si">Si</label>
									<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1n' value="no">No</label>

								</div>
							</fieldset>
						</div>
						<div class="pt-2">
							<button type="button" class="btn btn-success" style="height:40px; width:250px;" id="btnenv1c5s">Enviar</button>
						</div>
					</div>
				</div>
				<div id="comp6">
					<div class="card-body">
						<h5 class="card-title ">¿Cómo fue tu experiencia en los siguientes aspectos?
						</h5>
						<label for="">a) Pago en Taquilla.
						</label> <br>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active">
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> No lo utilize
							</label>
						</div><br>
						<label for="">b) Amabilidad del personal en tiendas.
						</label> <br>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active">
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> No lo utilize
							</label>
						</div> <br>
						<label for="">c) Calidad de los souvenirs.
						</label> <br>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active">
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> No lo utilize
							</label>
						</div> <br>
						<label for="">d) Uso de sanitarios.
						</label><br>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active">
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> No lo utilize
							</label>
						</div> <br>
						<label for="">f)En las Instalaciones.
						</label><br>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-secondary active">
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> Radio
							</label>
							<label class="btn btn-secondary">
								<input type="radio" name="options" id="option3" autocomplete="off"> No lo utilize
							</label>
						</div> <br>
					</div>
				</div>
			</div>
			<div class="card-footer text-muted bg-dark">
				<br>
			</div>
		</div>
	</div>
-->
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/encuesta.js"></script>
