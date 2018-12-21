<?php
	function get_db() {
		$host='localhost';
		$uname = 'root';
		$pword = '';
		$database = 'overwatchbts';
		$db = new mysqli($host,$uname,$pword,$database);
		if(mysqli_connect_error()) {
			die('Connection error no ('.mysqli_connect_errno().')'.mysqli_connect_errno());
		};
    $db->query("SET NAMES 'utf8'");
		return $db;
	}
?>
