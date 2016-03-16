<?php

	$database_error = "<b>Error:</b> Could not connect to database.";
	mysql_connect('', 'root', '') or die($database_error);
	$dbselect_error = "<b>Error:</b> Could not find selected database.";
	mysql_select_db('details') or die($dbselect_error);

?>
