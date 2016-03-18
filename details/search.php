<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php
    if(logged_in() === false) {
    	header("location: /details/signin");
	}else{
                        
	}

	if(empty($_POST['searchit']) === false) {
		$fnamesub = $_POST['firstname'];
		header("location: search?firstname=$fnamesub");
	}

	if(isset($_GET['firstname'])) {
		$fname = $_GET['firstname'];
	}else{

	}

	$sql= "SELECT * FROM detail_tickets WHERE first_name ='".$fname."' ORDER BY id DESC"; 
	$result=mysql_query($sql);
?>

	<div class="container">

		<form action="" method="POST">
			<div class="row">
				<div class="col-md-10">
					<input type="text" name="firstname" id="firstname" placeholder="First Name" />
				</div>
				<div class="col-md-2">
					<input type="submit" name="searchit" id="searchit" value="Search" class="button-raised" style="margin-top: 10px; height: 48px;" />
				</div>
			</div>
		</form> 

		<div class="card">
			<div class="card-title">Search Results</div>
			<div class="card-content">
				<table class="table" padding="10" style="text-align: center;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Locked</th>
							<th>Name</th>
							<th>Date</th>
							<th>Detail</th>
							<th>Compeleted</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							while ($row = mysql_fetch_array($result)) {
								$id = $row['id'];
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

                                if($options == 'Prepaid') {
			                        $option = "<center><h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6></center>";
			                    }elseif($options == 'Paid/Completed') {
			                        $option = "<center><h6 style='color: #20B473; margin: 0px; font-size: 20px;'>&check;</h6></center>";
			                    }elseif($options == 'Appointment') {
                                    $option = "<center><h6 style='color: #FFC017; margin: 0px; font-size: 20px;'><i class='fa fa-clock-o'></i></h6></center>";
                                }

                                if($row['locked'] == 0) {
                                    $locking = "<i class='fa fa-unlock'></i>";
                                }elseif($row['locked'] == 1) {
                                    $locking = "<i class='fa fa-lock'></i>";
                                }

                                echo '<tr>';
                                echo '<td>'.$id.'</td>';
                                echo '<td>'.$locking.'</td>';
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
		</div>

	</div>

<?php require("./include/footer.php"); ?>
