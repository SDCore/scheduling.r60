<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php

	$thequery = "SELECT * FROM detail_tickets ORDER BY id DESC LIMIT 6";
	$queryex = mysql_query($thequery);

?>

	<div class="container">
		<h2 class="welcome">Welcome, Route 60!</h2>

		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-title">Recent Tickets</div>
					<div class="card-content">
						<table class="table" padding="10" style="text-align: center;">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Detail</th>
									<th>Completed</th>
								</tr>
							</thead>
							<tbody>
								<?php

									while($row = mysql_fetch_array($queryex)) {
									$services = $row['services'];
									$options = $row['pre_paid_done'];

									if($services == 'wax'){
			                            $servicetitle = "Meguiar's Wax";
			                        }elseif($services == 1) {
			                            $servicetitle = "#1 Interior Only Detail";
			                        }
			                        elseif($services == 2) {
			                            $servicetitle = "#2 Exterior Only Detail";
			                        }
			                        elseif($services == 3) {
			                            $servicetitle = "#3 Complete Interior & Exterior";
			                        }
			                        elseif($services == 4) {
			                            $servicetitle = "#4 Engine Detail";
			                        }
			                        elseif($services == 5) {
			                            $servicetitle = "#5 Paint Restoration";
			                        }
			                        elseif($services == 6) {
			                            $servicetitle = "#6 Ultimate Interior & Exterior";
			                        }
			                        elseif($services == 7) {
			                            $servicetitle = "#7 Synthetic Sealer Special";
			                        }
			                        elseif($services == "hw") {
                                        $servicetitle = "Hand Wash - Car";
                                    }
                                    elseif($services == "hwfs") {
                                        $servicetitle = "Hand Wash - Car w/ Full Service";
                                    }
                                    elseif($services == "hwsuv") {
                                        $servicetitle = "Hand Wash - SUV";
                                    }
                                    elseif($services == "hwsuvfs") {
                                        $servicetitle = "Hand Wash - SUV w/ Full Service";
                                    }
			                        
			                        if($options == 'Paid') {
			                            $option = "<center><h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6></center>";
			                        }elseif($options == 'Prepaid') {
			                            $option = "<center><h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6></center>";
			                        }elseif($options == 'Completed') {
			                            $option = "<center><h6 style='color: #20B473; margin: 0px; font-size: 20px;'>&check;</h6></center>";
			                        }elseif($options == 'Appointment') {
                                        $option = "<center><h6 style='color: #FFC017; margin: 0px; font-size: 20px;'><i class='fa fa-clock-o'></i></h6></center>";
                                    }

			                        echo '<tr>';
			                        echo '<td><a href="'.$site.'/ticket?id='.$row['ticket_id'].'">'.$row['first_name'].' '.$row['last_name'].'</a></td>';
			                        echo '<td>'.$row['date'].'</td>';
			                        echo '<td>'.$servicetitle.'</td>';
			                        echo '<td>'.$option.'</td>';
			                        echo '</tr>';

								}

								?>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<a href="<?php echo $site; ?>/tickets?page=1" class="button-flat right">View All</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-title">Notifications</div>
					<div class="card-content">
						<div class="notification">
							<b>PSST!</b> Print.
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
