<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php

	$thequery = "SELECT * FROM detail_tickets ORDER BY id DESC LIMIT 6";
	$queryex = mysql_query($thequery);

	$zipcode = "12783979";
	$contents = file_get_contents('http://weather.yahooapis.com/forecastrss?w='.$zipcode.'&u=f');
	$xml = simplexml_load_string($contents);
	$xml->registerXPathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
	$location = $xml->channel->xpath('yweather:location');
	if(!empty($location)){
		foreach($xml->channel->item as $item) {
			$current = $item->xpath('yweather:condition');
			$forecast = $item->xpath('yweather:forecast');
			$current = $current[0];
			if($current['text'] == "Light Rain") {
				$picture = "/assets/imgs/weather/light_rain_2_hdv2.png";
			}elseif($current['text'] == "Fair") {
				$picture = "/assets/imgs/weather/fair_hdv2.png";
			}elseif($current['text'] == "Partly Cloudy") {
				$picture = "/assets/imgs/weather/partly_cloudy_hd.png";
			}elseif($current['text'] == "Fog") {
				$picture = "/assets/imgs/weather/fogv2.png";
			}elseif($current['text'] == "Cloudy") {
				$picture = "/assets/imgs/weather/partly_cloudy_hdv2.png";
			}elseif($current['text'] == "Mostly Cloudy") {
				$picture = "/assets/imgs/weather/mostly_cloudy.png";
			}elseif($current['text'] == "Rain"){
				$picture = "/assets/imgs/weather/rain_hd.png";
			}elseif($current['text'] == "Sleet and Freezing Rain"){
				$picture = "/assets/imgs/weather/sleet_freezing_rain.png";
			}elseif($current['text'] == "Freezing Rain"){
				$picture = "/assets/imgs/weather/sleet_freezing_rain.png";
			}elseif($current['text'] == "Sleet"){
				$picture = "/assets/imgs/weather/sleet_freezing_rain.png";
			}else{
				$picture = "/assets/imgs/weather/sunny_hdv2.png";
			}
			$output = <<<END
							<div class="card">
								<div class="card-title">{$location[0]['city']}, {$location[0]['region']}</div>
								<div class="card-content">
									Last Updated: {$current['date']}
									<br /><br />
									<div class="row">
										<div class="col-sm-6" style="text-align: center; padding-top: 5%;">
											<h1 style="margin: 0px; padding: 0px; font-size: 25pt;">{$current['temp']}&deg;F</h1>
											<h2 style="text-align: center; margin: 0px; padding: 0px; font-size: 20pt; font-weight: 400;">{$current['text']}</h2>
											<b><h3 style="text-align: center; margin: 0px; padding: 0px; font-size: 10pt; font-weight: 400;">High: {$forecast[0]['high']}&deg;F / Low: {$forecast[0]['low']}&deg;F</h3></b>
										</div>
										<div class="col-sm-6">
											<center><img src="{$picture}" style="width: 100%;" /></center>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-12">
											{$forecast[1]['day']}
											<span style="float: right;">
												High: {$forecast[1]['high']}&deg;F
												 / 
												Low: {$forecast[1]['low']}&deg;F
											</span> 
										</div>
										<div class="col-md-12">
											{$forecast[2]['day']}
											<span style="float: right;">
												High: {$forecast[2]['high']}&deg;F
												 / 
												Low: {$forecast[2]['low']}&deg;F
											</span>
										</div>
										<div class="col-md-12">
											{$forecast[3]['day']}
											<span style="float: right;">
												High: {$forecast[3]['high']}&deg;F 
												 / 
												Low: {$forecast[3]['low']}&deg;F
											</span>
										</div>
										<div class="col-md-12">
											{$forecast[4]['day']}
											<span style="float: right;">
												High: {$forecast[4]['high']}&deg;F 
												 / 
												Low: {$forecast[4]['low']}&deg;F
											</span>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<a href="http://www.weather.com/weather/today/l/60060:4:US" class="button-flat right" target="_blank">Full Report</a>
									<div class="clear"></div>
								</div>
							</div>
END;
		}
	}else{
	    $output = '<font style="font-size: 18px;">Location not found. Try a different WOEID.</font>';
	}

	?>

	<div class="container">
		<h2 class="welcome">Welcome,
			<?php
				if(logged_in() === true) {
					echo $user_data['description'];
				}else{
					echo "Guest";
				}
			?>!</h2>

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
			                        
			                        if($options == 'Prepaid') {
			                            $option = "<center><h6 style='color: #E14747; margin: 0px; font-size: 20px;'>X</h6></center>";
			                        }elseif($options == 'Paid/Completed') {
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
				<?php echo $output; ?>
			</div>

			<!-- <div class="col-md-4">
				<div class="card">
					<div class="card-title">Notifications</div>
					<div class="card-content">
						<div class="notification">
							<b>PSST!</b> Print.
						</div>
					</div>
				</div>
			</div> -->
		</div>

	</div>

<?php require("./include/footer.php"); ?>
