<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

	<?php

		if(logged_in() === false) {
            header("location: /reports/signin");
        }else{
                        
        }

        $profileID = $_GET['id'];
        $getPersonInfo = mysql_query("SELECT * FROM report_profiles WHERE id = '$profileID'");

        while($row = mysql_fetch_array($getPersonInfo)) {
        	$id = $row['id'];
        	$firstName = $row['first_name'];
        	$lastName = $row['last_name'];
        	$storeID = $row['storeID'];
        	$picture = $row['picture'];
        	$storeName = $row['store'];
        	$average = $row['average'];
        	$strikes = $row['strikes'];
        	$rating = $row['rating'];
        }

	?>

	<div class="container">
		
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-title"><?php echo $firstName; ?> <?php echo $lastName; ?> - #<?php echo $storeID; ?> <span style="float: right;"><?php echo $storeName; ?></span></div>
					<div class="card-content">
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo $picture; ?>" style="width: 100%;" />
							</div>
							<div class="col-md-4">&nbsp;</div>
							<div class="col-md-4" style="text-align: center;">
								$$$ Average: <?php echo $average; ?>
								<br />
								Strikes: <?php echo $strikes; ?>/3
								<br />
								Rating: <?php echo $rating; ?>/5
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="button-raised">+ Strike</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="button-raised">- Strike</a>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-12">
								<a href="#" class="button-raised">New Report</a>
							</div>
							<br /><br />
							<div class="col-md-12">
								<a href="#" class="button-raised">Edit Report</a>
							</div>
							<br /><br />
							<div class="col-md-12">
								<a href="#" class="button-raised">Edit Profile</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
