<?php

	$base_url = "https://query.yahooapis.com/v1/public/yql";
	$yql_query = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='mundelein, il')";
	$yql_query_url = $base_url . "?q=" . urlencode($yql_query) . "&format=json";

	$request_url = str_replace("/ /", "%20", $yql_query_url);

	// Making call with cURL
	$json = file_get_contents($request_url);

	// Convert JSON to PHP Object
	$phpObj = json_decode($json);

	// Getting necessary content
	$cityInfo = $phpObj->query->results->channel->location->city . ", " . $phpObj->query->results->channel->location->region;
	$currentDate = $phpObj->query->results->channel->item->condition->date;
	$currentTemperature = $phpObj->query->results->channel->item->condition->temp;
	$currentText = $phpObj->query->results->channel->item->condition->text;
	$currentHigh = $phpObj->query->results->channel->item->forecast[0]->high;
	$currentLow = $phpObj->query->results->channel->item->forecast[0]->low;

	$dayOneDay = $phpObj->query->results->channel->item->forecast[1]->day;
	$dayOneHigh = $phpObj->query->results->channel->item->forecast[1]->high;
	$dayOneLow = $phpObj->query->results->channel->item->forecast[1]->low;

	$dayTwoDay = $phpObj->query->results->channel->item->forecast[2]->day;
	$dayTwoHigh = $phpObj->query->results->channel->item->forecast[2]->high;
	$dayTwoLow = $phpObj->query->results->channel->item->forecast[2]->low;

	$dayThreeDay = $phpObj->query->results->channel->item->forecast[3]->day;
	$dayThreeHigh = $phpObj->query->results->channel->item->forecast[3]->high;
	$dayThreeLow = $phpObj->query->results->channel->item->forecast[3]->low;

	$dayFourDay = $phpObj->query->results->channel->item->forecast[4]->day;
	$dayFourHigh = $phpObj->query->results->channel->item->forecast[4]->high;
	$dayFourLow = $phpObj->query->results->channel->item->forecast[4]->low;

	$weatherImgLocation = "/global/weather_imgs";

	if($currentText == "Partly Cloudy") {
		$picture = $weatherImgLocation . "/partly-cloudy_png.png";
	}elseif($currentText == "Fog") {
 		$picture = $weatherImgLocation . "/fog_png.png";
 	}elseif($currentText == "Cloudy") {
		$picture = $weatherImgLocation . "/partly-cloudy_png.png";
	}elseif($currentText == "Mostly Cloudy") {
		$picture = $weatherImgLocation . "/mostly-cloudy_png.png";
	}elseif($currentText == "Rain"){
		$picture = $weatherImgLocation . "/rain_png.png";
	}elseif($currentText == "Sleet and Freezing Rain"){
		$picture = $weatherImgLocation . "/sleet-freezing-rain_png.png";
	}elseif($currentText == "Freezing Rain"){
		$picture = $weatherImgLocation . "/sleet-freezing-rain_png.png";
	}elseif($currentText == "Sleet"){
		$picture = $weatherImgLocation . "/sleet-freezing-rain_png.png";
	}elseif($currentText == "Light Rain") {
		$picture = $weatherImgLocation . "/light-rain_png.png";
	}elseif($currentText == "Fair") {
		$picture = $weatherImgLocation . "/fair_png.png";
	}elseif($currentText == "Mostly Sunny") {
		$picture = $weatherImgLocation . "/fair_png.png";	
	}elseif($currentText == "Scattered Showers") {
		$picture = $weatherImgLocation . "/scattered-showers_png.png";
	}else{
		$picture = $weatherImgLocation . "/sunny_png.png";
	}

?>

	<div class="card">
		<div class="card-title">Weather for <?php echo $cityInfo; ?></div>
		<div class="card-content">
			<center><?php echo $currentDate; ?></center>
			<br />
			<div class="row">
				<div class="col-xs-6 col-sm-6" style="text-align: center; padding-top: 5%;">
					<h1 style="margin: 0px; padding: 0px; font-size: 25pt;"><?php echo $currentTemperature; ?>&deg;F</h1>
					<h2 style="margin: 0px; padding: 0px; font-size: 20pt; font-weight: 400;"><?php echo $currentText; ?></h2>
					<b><h3 style="margin: 0px; padding: 0px; font-size: 10pt; font-weight: 400;">High: <?php echo $currentHigh; ?>&deg;F / Low: <?php echo $currentLow; ?>&deg;F</h3></b>
				</div>
				<div class="col-xs-6 col-sm-6">
					<center><img src="<?php echo $picture; ?>" style="width: 100%;" /></center>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<?php echo $dayOneDay; ?>
					<span style="float: right;">
						High: <?php echo $dayOneHigh; ?>&deg;F
						 / 
						Low: <?php echo $dayOneLow; ?>&deg;F
					</span>
				</div>
				<div class="col-md-12">
					<?php echo $dayTwoDay; ?>
					<span style="float: right;">
						High: <?php echo $dayTwoHigh; ?>&deg;F
						 / 
						Low: <?php echo $dayTwoLow; ?>&deg;F
					</span>
				</div>
				<div class="col-md-12">
					<?php echo $dayThreeDay; ?>
					<span style="float: right;">
						High: <?php echo $dayThreeHigh; ?>&deg;F
						 / 
						Low: <?php echo $dayThreeLow; ?>&deg;F
					</span>
				</div>
				<div class="col-md-12">
					<?php echo $dayFourDay; ?>
					<span style="float: right;">
						High: <?php echo $dayFourHigh; ?>&deg;F
						 / 
						Low: <?php echo $dayFourLow; ?>&deg;F
					</span>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<a href="http://www.weather.com/weather/today/l/60060:4:US" class="button-flat right" target="_blank">Full Report</a>
			<div class="clear"></div>
		</div>
	</div>

<?php

	// Showing all JSON content for easy decoding into actual readable text
	

?>
