<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

	<div class="container">
		<h2 class="welcome">Welcome,
			<?php
				if(logged_in() === true) {
					echo $user_data['name'];
				}else{
					echo "Guest";
				}
			?>!</h2>

		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-title">Recent Reports</div>
					<div class="card-content">
						<table class="table" padding="10" style="text-align: center;">
							<thead>
								<tr>

								</tr>
							</thead>
							<tbody>
								<tr>

								</tr>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<a href="<?php echo $site; ?>/#" class="button-flat right">View All</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<?php include("..//global/include/weather.php"); ?>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
