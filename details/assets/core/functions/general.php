<?php

	function array_sanitize(&$item) {
		$item = mysql_real_escape_string($item);
	}

	function sanitize($data) {
		return mysql_real_escape_string($data);
	}

	function output_error($errors) {
		$output = array();

		foreach($errors as $error) {
			//$output[] = $error;
			$output[] = '<div class="mini-card alert">'.$error.'</div>';
		}
		return ''.implode('', $output).'';
	}

?>