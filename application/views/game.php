<style>
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
<div class="container-fluid">
	<h1 class="text-light  text-center aumenta">
		<font color='#FFF79F'>Gana tu premio</font>
	</h1>
	<br>
	<div class="row">
		<div class="pl-4 col-sm-12 row">
			<div class="col-sm-4 ">
				<div class="card text-white bg-dark " style="max-width:15rem;">
					<div class="card-header">
						OPCION 1
					</div>
					<div class="card-body">
						<img src="<?php echo base_url() ?>image/buzon.png" id="img1" width="100" height="100"></div>
				</div>
			</div>
			<div class="col-sm-4 pr-1">
				<div class="col-sm pl-2">
					<div class="card text-white bg-dark mb-3" style="max-width:15rem;">
						<div class="card-header">
							OPCION 1
						</div>
						<div class="card-body">
							<img src="<?php echo base_url() ?>image/buzon.png" id="img2" width="100" height="100"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 pl-2">
				<div class="col-sm pl-2 pr-1 ">
					<div class="card text-white bg-dark mb-3" style="max-width:15rem;">
						<div class="card-header">
							OPCION 1
						</div>
						<div class="card-body">
							<img src="<?php echo base_url() ?>image/buzon.png" id="img3" width="100" height="100"></div>
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
		<button type="submit" id="btnplay" onclick="parar()" class="btn btn-warning ">
		<img id="imgBoton" src="<?php echo base_url(); ?>image/stop.png" width="250" height="250">
	</button>
	</center>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<h4 id="hname"></h4><br>
			<img width="500" height="500" id="imgModal">
			<div class="modal-footer"> </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
	<script type="text/javascript" src="<?php echo base_url(); ?>scripsJS/game.js"></script>
