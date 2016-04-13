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
						<div class="col-md-4">
							<img src="<?php echo $picture; ?>" style="width: 100%;" />
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
