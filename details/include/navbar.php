<!DOCTYPE html>

<html>

<head>

	<?php
	
		if(logged_in() === true) {
			$title = $user_data['name']." - ";
		}else{
			$title = "";
		}
	
	?>

	<title><?php echo $title; ?>Detail Manager</title>
	<link rel="icon" type="image/x-icon" href="<?php echo $site; ?>/assets/imgs/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/global/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/global/css/main.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#2196F3">
	<link rel="icon" sizes="192x192" href="./details/assets/imgs/favicon.ico">
	
	<style>
		<?php
		
			if(logged_in() === true) {
				echo '
					.left-nav > .header {
						background: url('.$user_data['avatar'].') center center no-repeat;
						background-size: cover;
					}
				';
			}else{
				echo '
					.left-nav > .header {
						background: url(assets/imgs/Background-Out.png) center center no-repeat;
						background-size: cover;
					}
				';
			}
		
		?>
	</style>

</head>

<body>

	<div class="nav">
		<a href="<?php echo $site; ?>" class="brand">Detail Manager</a>

		<div class="right">
			<?php

				if(logged_in() === true) {
					if($user_data['username'] == "route60admin") {
						echo '<a href="'.$site.'/settings" class="navigation"><i class="fa fa-cog"></i></a>';
					}else{
						echo '';
					}
				}else{
					echo '';
				}

			?>
			<?php
				if(logged_in() === true) {
					echo '<a href="'.$site.'/signout" class="navigation"><i class="fa fa-power-off"></i> Sign Out</a>';
				}else{
					echo '<a href="'.$site.'/signin" class="navigation"><i class="fa fa-power-off"></i> Sign In</a>';
				}
			?>
		</div>
	</div>

	<div class="left-nav">
		<div class="header hidden-xs hidden-sm">
			<div class="brand hidden-xs hidden-sm">
				<?php
					// if(logged_in() === true) {
					//	echo $user_data['description'];
					// }else{
					//	echo "Guest";
					// }
				?>
			</div>
		</div>
		<div class="links">
			<a href="<?php echo $site; ?>"><i class="fa fa-home"></i> <span class="hidden-xs hidden-sm">Home</span></a>
			<a href="<?php echo $site; ?>/tickets?page=1"><i class="fa fa-ticket"></i> <span class="hidden-xs hidden-sm">Tickets</span></a>
			<a href="<?php echo $site; ?>/search"><i class="fa fa-search"></i> <span class="hidden-xs hidden-sm">Search</span></a>
			<hr style="margin-top: 2px; margin-bottom: 2px;">
			<a href="/"><i class="fa fa-globe"></i> <span class="hidden-xs hidden-sm">Navigation</span></a>
		</div>
	</div>
