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

	<title><?php echo $title; ?>Report Manager</title>
	<link rel="icon" type="image/x-icon" href="<?php echo $site; ?>/assets/imgs/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site; ?>/assets/css/main.css" />
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
		<a href="<?php echo $site; ?>" class="brand">Report Manager</a>

		<div class="right">
			<?php

				if(logged_in() === true) {
					if($user_data['username'] == "cj") {
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
			<div class="brand">
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
			<a href="#"><i class="fa fa-paperclip"></i> <span class="hidden-xs hidden-sm">Reports</a>
			<a href="#"><i class="fa fa-search"></i> <span class="hidden-xs hidden-sm">Search</span></a>
			<a href="<?php echo $site; ?>/info"><i class="fa fa-info-circle"></i> <span class="hidden-xs hidden-sm">Info</span></a>
			<hr>
<a href="/"><i class="fa fa-globe"></i> <span class="hidden-xs hidden-sm">Navigate</span></a>
		</div>
	</div>
