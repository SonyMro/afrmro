<div class="container-fluid">
	<center>
		<h2 class="text-white"> <b> Lista de felicitaciones</b></h2>
	</center>
	<br>
	<div class="row">
		<div class="col-sm-9 col-md-10 col-lg-10">
			<div class="card text-center">
				<div class="card-header bg-dark text-white">
					<ul class="list-inline">
						<li id="">
						</li>
					</ul>
				</div>
				<div class="card-body ">
					<?php foreach ($fel as $f) {
						?>
						<div class="alert alert-success">
							<h4>Felicitacion:</h4>
							<h4> <?php echo $f->Felicitacion ?></h4>
						</div> <br>
					<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>
