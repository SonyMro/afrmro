<style>
	.font {
		font-family: 'Luckiest Guy', cursive;
		font-size: 12px;
		text-transform: uppercase;
	}

	.box {
		width: 705px;
		height: 305px;
		background-color: black;
		border-radius: 10px;
	}

	.animation-example.one {
		color: #FA2A00;
		outline: 25px dashed #F2D694;
		box-shadow: 0 0 0 25px #FA2A00;
		animation: 1s animateBorderOne ease infinite;
	}

	@keyframes animateBorderOne {
		to {
			outline-color: #FA2A00;
			box-shadow: 0 0 0 25px #F2D694;
		}
	}
</style>
<div class="container-fluid font">
	<h1 class="text-light  text-center aumenta">
		<font color='#FFF79F'>Gana tu premio</font>
	</h1>
	<br>
	<div class="row">
		<div class="pl-4 col-sm-12 row">
			<div class="col-sm-4 ">
				<div class="card text-white bg-dark " style="max-width:20rem;">
					<div class="card-header">
						<h4 id="h1"> </h4>
					</div>
					<div class="card-body">
						<div id="div1" class="cod">

						</div>
						<img src="<?php echo base_url() ?>image/buzon.png" id="img1" width="180" height="180">
					</div>

				</div>
			</div>
			<div class="col-sm-4 pr-1">
				<div class="col-sm pl-2">
					<div class="card text-white bg-dark mb-3" style="max-width:20rem;">
						<div class="card-header">
							<h4 id="h2"> </h4>
						</div>
						<div class="card-body">
							<div id="div2" class="cod">

							</div>
							<img src="<?php echo base_url() ?>image/buzon.png" id="img2" width="180" height="180">
						</div>

					</div>
				</div>
			</div>
			<div class="col-sm-4 pl-1">
				<div class="col-sm pl-1 pr-1 ">
					<div class="card text-white bg-dark mb-3" style="max-width:20rem;">
						<div class="card-header">
							<h4 id="h3"> </h4>
						</div>
						<div class="card-body">
							<div id="div3" class="cod">

							</div>
							<img src="<?php echo base_url() ?>image/buzon.png" id="img3" width="180" height="180">
						</div>

					</div>
				</div>
			</div>
			<br>
			<div class="col-sm-12 col-md-12 pr-5 pt-3 pb-5">
				<!--marquee-- direction="right"></!--marquee -->
				<h1 class="text-white" id="h"></h1>
				<div class=" box animation-example one">
					<img class="rounded pt-2" src="<?php echo base_url() ?>image/buzon.png" id="img5" width="300" height="300">
				</div>
			</div>
		</div>
	</div>
	<center>
		<button type="submit" id="btnplay" onclick="parar()" class="btn btn-warning brilloBoton">
			<img id="imgBoton" src="<?php echo base_url(); ?>image/stop.png" width="200" height="200">
		</button>
	</center>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="card text-white bg-success mb-5" style="max-width: 50rem;">
				<div class="card-header">
					<h4>HAZ ATRAPADO UN: </h4>
					<h4 id="hname" class="pl-1">
					</h4>
				</div>
				<div class="card-body">
					<img width="470" height="470" id="imgModal">
				</div>
			</div>
		</div><!-- /.modal-content -->
		<input type="text" style="display: none;" id='txtMod'>
	</div><!-- /.modal -->
</div>
<audio id="audio" src="<?php echo base_url(); ?>image/son1.mp3" preload="auto" controls style="display: none;"></audio>
<audio id="audio1" src="<?php echo base_url(); ?>image/son2.mp3" preload="auto" controls style="display: none;"></audio>
<audio id="audio2" src="<?php echo base_url(); ?>image/fin.mp3" preload="auto" controls style="display: none;"></audio>
<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/game.js"></script>
