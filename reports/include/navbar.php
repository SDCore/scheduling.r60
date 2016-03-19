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
		<div class="header">
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
			<a href="<?php echo $site; ?>"><i class="fa fa-home"></i> Home</a>
			<a href="#"><i class="fa fa-paperclip"></i> Reports</a>
			<a href="#"><i class="fa fa-search"></i> Search</a>
			<a href="<?php echo $site; ?>/info"><i class="fa fa-info-circle"></i> Info</a>
		</div>
	</div>
