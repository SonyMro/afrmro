<div class="container-fluid">
	<h1 class="text-light  text-center">Quejas y sugerencias</h6>
		<br>
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 pl-3">
				<!--Nav-->
				<div class="card text-white bg-dark" style="width: 18rem;">
					<div class="card-header">
						<br>
					</div>
					<img src="<?php echo base_url() ?>image/africam.png" width="150px" height="150px" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">Opciones</h5>
						<div class="list-group">
							<a type="button" class="btn  btn-secondary" href="<?php echo base_url(); ?>">
								<h5> <strong>
										◄ Regresar</strong> </h5>
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
									<input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
								</div>

								<button type="button" class="btn btn-success" style="height:40px; width:180px;" id="btnBuscarReserv">Buscar</button>
							</div>
							<div id="subcomp1s">
								<fieldset>
									<div class="form-group">
										<label for="inputPassword6">
											1. Durante la reservación, ¿te ofrecieron algún servicio educativo?
										</label><br />
										<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1s' value="si">Si</label>
										<label class="radio-inline"><input type="radio" name="optradio1" id='rdop1n' value="no">No</label>
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group">
										<label for="inputPassword6">
											2. Durante la reservación, ¿te ofrecieron el servicio de alimentos?
										</label><br />
										<label class="radio-inline"><input type="radio" name="optradio2" id='rdop2s' value="si">Si</label>
										<label class="radio-inline"><input type="radio" name="optradio2" id='rdop2n' value="no">No</label>
									</div>
								</fieldset>
								<div id="subsubcomp1s">
									<div class="form-group">
										<label for="inputPassword6">
											3. ¿Cuál fue el motivo?
										</label><br />
										<input type="text" class="form-control" id="" placeholder="">
									</div>
								</div>
								<fieldset>
									<div class="form-group">
										<label for="">
											4. ¿Cómo fue tu experiencia con la resevación?
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
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#ReSerEduSi').hide();
		$('#comp2s').hide();
		$('#comp3n').hide();
		$('#subcomp1s').hide();
		$('#subsubcomp1s').hide();
		$('#cardInfo').hide();
		$('#comp4s').hide();
		$('#guia').hide();
		$('#comp5').hide();
		$('#busContratado').hide();
		$('#servicioEducativo').hide();
		$('#alimentosContratados').hide();
		$('#comp6').hide();
	});
	$('#btnc1rs1').click(function() {
		$('#comp1s').fadeOut('slow');
		$('#comp2s').fadeIn('slow');
	});
	$('#btnc1rn1').click(function() {
		$('#comp1s').fadeOut('slow');
		$('#comp3n').fadeIn('slow');
		//alert('hi');
	});
	$('#rdop2s').click(function() {
		$('#subsubcomp1s').fadeIn('slow');
	});
	$('#rdop2n').click(function() {
		$('#subsubcomp1s').fadeOut('slow');
	});
	$('#btnBuscarReserv').click(function(event) {
		$('#subcomp1s').fadeIn('slow');
		$('#compBuscar').hide(1000);
		$('#cardInfo').show('slow');
	});
	$('#btnenv1c2ss1').click(function() {
		//alert('si');
		$('#comp2s').hide(2000);
		$('#comp4s').show('slow');
	});

	function Guias(event) {
		var valorGuia = $(event).attr('value');
		if (valorGuia == 'guia' || valorGuia == 'operador guia') {
			$('#guia').show('slow');
		} else {
			alert('no');
		}
	}

	function noreservacion(ev) {
		//var valorGuia = $(ev).attr('value');
		var clase = $(ev).attr('class');
		console.log(clase);
		var seleccion = $('.noReservacion').prop('checked');
		var seleccion2 = $('.noReservacionNinguno').prop('checked');
		var bandera = true;
		//console.log(seleccion);
		if (seleccion) {
			$('.noReservacion').prop("disabled", false);
			$('.noReservacionNinguno').prop("disabled", true);
		} else {
			$('.noReservacionNinguno').prop("disabled", false);
		}

		if (seleccion2) {
			$('.noReservacion').prop("disabled", true);
			$('.noReservacionNinguno').prop("disabled", false);
		} else {
			$('.noReservacion').prop("disabled", false);
		}
	}

	$('#btnenv1c4s').click(function() {
		$('#comp4s').hide('slow');
		$('#guia').hide(1000);
		$('#comp5').show('slow');
	});
	var banderaBuscantratado = true;
	$("#btnBusContratado").click(function() {
		var uno = document.getElementById('btnBusContratado');
		if (banderaBuscantratado || uno.innerText == 'Autobús contratado. ▼') {
			$('#busContratado').show('slow');
			uno.innerText = 'Autobús contratado. ▲';
			banderaBuscantratado = false;
		} else {
			$('#busContratado').hide('slow');
			uno.innerText = 'Autobús contratado. ▼';
			banderaBuscantratado = true;
		}
	});
	var banderaservicioEducativo = true;
	$("#btnservicioEducativo").click(function() {
		//	alert('hi');
		var uno = document.getElementById('btnservicioEducativo');
		if (banderaservicioEducativo || uno.innerText == 'Servicio Educativo. ▼') {
			$('#servicioEducativo').show('slow');
			uno.innerText = 'Servicio Educativo. ▲';
			banderaservicioEducativo = false;
		} else {
			$('#servicioEducativo').hide('slow');
			uno.innerText = 'Servicio Educativo. ▼';
			banderaservicioEducativo = true;
		}
	});
	var banderaalimentosContratados = true;
	$("#btnalimentosContratados").click(function() {
		//	alert('hi');
		var uno = document.getElementById('btnalimentosContratados');
		if (banderaalimentosContratados || uno.innerText == 'Alimentos Contratados. ▼') {
			$('#alimentosContratados').show('slow');
			uno.innerText = 'Alimentos Contratados. ▲';
			banderaalimentosContratados = false;
		} else {
			$('#alimentosContratados').hide('slow');
			uno.innerText = 'Alimentos Contratados. ▼';
			banderaalimentosContratados = true;
		}
	});
	$('#btnenv1c5s').click(function() {
		$('#comp5').hide(1000);
		$('#comp6').show('slow');
	});

	function ReSerEdu(event) {
		var idreseervacion = $(event).attr('value');
		if (idreseervacion == 'si') {
			$('#ReSerEduSi').show('slow');
		} else {
			console.log('no');
		}
	}
	var cont = 1;
	$('#btnTemas').click(function() {

		$('#temasEduAgregados').append('<div class="eliminarTema' + cont + '"><br/><input type="button" class="btn btn-outline-success pt-2" style="width:100%; word-wrap: break-word;" value="' +
			$('#txtTemaAdd').val() + '"/><button class="btn btn-danger"  onClick="cancelarTema(this)" id="' + cont + '">X</button><br/></div>');
		$('#txtTemaAdd').val('');
		cont++;
	});

	function cancelarTema(ev) {
		var ValorTema = $(ev).attr('value');
		var idTema = $(ev).attr('id');
		console.log(idTema);
		var eli = 'eliminarTema' + idTema;
		$('.eliminarTema' + idTema).remove();

	}
</script>