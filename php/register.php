<?php 
	// 接受Register传来的用户名和密码
	$name = $_POST["login"];
	$password = $_POST["password"];
	
	// 调用数据库的插入函数，插入用户名以及密码
	require_once 'db_connect.php';
	db_register($name, $password);
	
//	header("location: index_news.html");
//	$url="index_news.html";
//	echo "<script > location.href='$url' </script>";
?>
