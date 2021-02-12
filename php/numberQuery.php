<?php
	$key = $_POST["key"];
	require_once 'db_connect.php';
	$telNumber = db_telNumber($key);
	echo $telNumber;
//	header("location: login.html");
?>