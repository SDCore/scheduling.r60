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
        	$working = $row['working'];
        	$phoneNumber = $row['phone_number'];
        	$qnotes = $row['quicknotes'];
        }

        if($working == 1) {
		   	$workOut = "<h6 style='color: #20B473; margin: 0px; font-size: 20px;'>&check;</h6>";
		}else{
			$workOut = "<h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6>";
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
							<div class="col-md-4" style="text-align: center;">
								Phone Number
								<br />
								<?php echo $phoneNumber; ?>
								<br /><br />
								Currently Hired
								<br />
								<?php echo $workOut; ?>
							</div>
							<div class="col-md-4" style="text-align: center;">
								$$$ Average: $<?php echo $average; ?>
								<br />
								Strikes: <?php echo $strikes; ?>/3
								<br />
								Rating: <?php echo $rating; ?>/5
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="button-raised" style="background: #20B473;">+ Strike</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="button-raised" style="background: #E14747;">- Strike</a>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-4">
								<a href="#" class="button-raised">New Report</a>
							</div>
							<div class="col-md-4">
								<a href="#" class="button-raised">Edit Report</a>
							</div>
							<div class="col-md-4">
								<a href="#" class="button-raised">Edit Profile</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="card-footer">
						<a href="#" class="button-flat" style="float: right;">Print Profile</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-title">Quick Notes</div>
					<div class="card-content">
						<textarea class="textarea" name="quicknotes" id="quicknotes" placeholder="Type notes here..." rows="8"><?php echo $qnotes; ?></textarea>
						<br />
						<input type="submit" class="button-raised" name="updatenotes" id="updatenotes" value="Update Notes" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-title"><?php echo $firstName; ?>'s Reports</div>
					<div class="card-content">
						<table class="table" padding="10" style="text-align: center;">
							<thead>
								<tr>
									<td>Date</td>
									<td>Score</td>
									<td>Completed</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>4/30/2016</td>
									<td>4.5/5</td>
									<td>C</td>
								</tr>
								<tr>
									<td>4/30/2016</td>
									<td>4.5/5</td>
									<td>C</td>
								</tr>
								<tr>
									<td>4/30/2016</td>
									<td>4.5/5</td>
									<td>C</td>
								</tr>
								<tr>
									<td>4/30/2016</td>
									<td>4.5/5</td>
									<td>C</td>
								</tr>
								<tr>
									<td>4/30/2016</td>
									<td>4.5/5</td>
									<td>C</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
