<!DOCTYPE html>

<html>

<head>

	<title>Route 60 Detailing</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/main.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<body>

	<div class="nav">
		<a href="<?php echo $site; ?>" class="brand">Detail Manager</a>

		<div class="right">
			<a href="#" class="navigation"><i class="fa fa-cog"></i></a>
			<a href="#" class="navigation"><i class="fa fa-power-off"></i></a>
		</div>
	</div>

	<div class="left-nav">
		<div class="header">
			<div class="brand">
				<?php
					if(logged_in() === true) {
						echo "Route 60";
					}else{
						echo "Guest";
					}
				?>
			</div>
		</div>
		<div class="links">
			<a href="<?php echo $site; ?>"><i class="fa fa-home"></i> Home</a>
			<a href="<?php echo $site; ?>/tickets?page=1"><i class="fa fa-ticket"></i> Tickets</a>
			<a href="#"><i class="fa fa-search"></i> Search</a>
		</div>
	</div>
