<?php

	function register_user($register_data) {
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = hash('sha512', $register_data['password']);
		
		$fields = '`'.implode('`, `', array_keys($register_data)).'`';
		$data = "'".implode("', '", $register_data)."'";
		
		mysql_query("INSERT INTO `report_users` ($fields) VALUES ($data)");
	}

	function user_count() {
		return mysql_result(mysql_query("SELECT COUNT('user_id') FROM `report_users` WHERE `active`=1"), 0);
	}

	function user_data($user_id) {
		$data = array();
		$user_id = (int)$user_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if($func_num_args > 1) {
			unset($func_get_args[0]);
			$fields = '`'.implode('`, `', $func_get_args).'`';
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `report_users` WHERE `user_id`='$user_id'"));			
			return $data;
		}
		
	}

	function stream_data($stream_id) {
		$data = array();
		$stream_id = (int)$stream_id;
		
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		
		if($func_num_args > 1) {
			unset($func_get_args[0]);
			$fields = '`'.implode('`, `', $func_get_args).'`';
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `report_streams` WHERE `uniqueid`='$stream_id'"));			
			return $data;
		}
		
	}

	function logged_in() {
		return (isset($_SESSION['user_id'])) ? true : false;
	}

	function user_exists($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `report_users` WHERE `username`='$username'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}

	function stream_exists($stream_id) {
		$streamid = sanitize($stream_id);
		$query = mysql_query("SELECT COUNT(`uniqueid`) FROM `report_streams` WHERE `uniqueid`='$stream_id'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function email_exists($email) {
		$email = sanitize($email);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `report_users` WHERE `email`='$email'");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function user_active($username) {
		$username = sanitize($username);
		$query = mysql_query("SELECT COUNT(`user_id`) FROM `report_users` WHERE `username`='$username' AND `active`=1");
		return (mysql_result($query, 0) == 1) ? true : false;
	}
	
	function user_id_from_username($username) {
		$username = sanitize($username);
		return mysql_result(mysql_query("SELECT `user_id` FROM `report_users` WHERE `username`='$username'"), 0, 'user_id');
	}
	
	function login($username, $password) {
		$user_id = user_id_from_username($username);
		$username = sanitize($username);
		$password = hash('sha512', $password);
		return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `report_users` WHERE `username`='$username' AND `password`='$password'"), 0) == 1) ? $user_id : false;
	}

?>
