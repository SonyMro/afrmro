<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Evaluación del Servicio</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css3/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<!-- include the style -->
	<!-- include a theme -->
	<link rel="stylesheet" href="<?php echo base_url('AlertifyJS/alertify.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('AlertifyJS/themes/default.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('ChartJS/Chart.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('ChartJS/Chart.min.css') ?>">
</head>

<body>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery-3.4.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/popper.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/sweetalert.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ChartJS/Chart.bundle.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ChartJS/Chart.bundle.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ChartJS/Chart.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ChartJS/Chart.js') ?>"></script>
	<script src="<?php echo base_url('AlertifyJS/alertify.min.js'); ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<nav class=" rounded navbar navbar-light bg-dark">
		<a class="navbar-brand">
			<img src="<?php echo base_url() ?>image/africam1.png" alt="africam" width="100" height="45" id="imgHome" />
		</a>

		<div class="btn-group">
			<?php if ($verNav) {
				//echo 'true';
				?>
				<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="<?php echo base_url() ?>image/user.svg" alt="" width="30px" height="30px">
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<button class="dropdown-item" type="button"><a href="<?php echo base_url('/index.php/cllCodigo'); ?>">Canjear Premios</a></button>
					<button class="dropdown-item" type="button"><a href="<?php echo base_url('/index.php/cllUser/menu2'); ?>"> Ir a Menu</a></button>
					<button class="dropdown-item" type="button"><a href="<?php echo base_url('/index.php/cllUser/logout'); ?>"> Cerrar sesión</a> </button>
				</div>
			<?php
			} else {
				echo '&#x1F99D;';
			}
			?>
		</div>
	</nav>
