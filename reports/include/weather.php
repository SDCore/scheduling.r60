<?php

	$base_url = "http://query.yahooapis.com/v1/public/yql";
	$yql_query = "select * from weather.forecast where woeid in (select woeid from geo.places(1) where text='chicago, il')";
	$yql_query_url = $base_url . "?q=" . urlencode($yql_query) . "&format=json";

	// Making call with cURL
	$session = curl_init($yql_query_url);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($session);

	// Convert JSON to PHP Object
	$phpObj = json_decode($json);
	var_dump($phpObj);

?>