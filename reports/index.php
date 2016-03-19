<?php require("./assets/core/init.php"); require("./include/navbar.php"); ?>

<?php

	$zipcode = $user_data['zipcode'];
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
				$picture = "/details/assets/imgs/weather/light-rain_png.png";
			}elseif($current['text'] == "Fair") {
				$picture = "/details/assets/imgs/weather/fair_png.png";
			}elseif($current['text'] == "Partly Cloudy") {
				$picture = "/details/assets/imgs/weather/partly-cloudy_png.png";
			}elseif($current['text'] == "Fog") {
				$picture = "/details/assets/imgs/weather/fog_png.png";
			}elseif($current['text'] == "Cloudy") {
				$picture = "/details/assets/imgs/weather/partly-cloudy_png.png";
			}elseif($current['text'] == "Mostly Cloudy") {
				$picture = "/details/assets/imgs/weather/mostly-cloud_png.png";
			}elseif($current['text'] == "Rain"){
				$picture = "/details/assets/imgs/weather/rain_png.png";
			}elseif($current['text'] == "Sleet and Freezing Rain"){
				$picture = "/details/assets/imgs/weather/sleet-freezing-rain_png.png";
			}elseif($current['text'] == "Freezing Rain"){
				$picture = "/details/assets/imgs/weather/sleet-freezing-rain_png.png";
			}elseif($current['text'] == "Sleet"){
				$picture = "/details/assets/imgs/weather/sleet-freezing-rain_png.png";
			}else{
				$picture = "/details/assets/imgs/weather/sunny_png.png";
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
	    $output = '

		<div class="card">
			<div class="card-title">Weather</div>
			<div class="card-content">
				<center><font style="font-size: 18px;">Please sign in to see weather.</font></center>
			</div>
		</div>';
	}

	?>

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
				<?php echo $output; ?>
			</div>
		</div>

	</div>

<?php require("./include/footer.php"); ?>
