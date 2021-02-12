<?php 
	// 接受PHP传来的用户名和密码
	$name = $_POST["name"];
	$password = $_POST["password"];
	
	// 调用数据库的PHP查询函数，输入用户名，返回密码
	require_once 'db_connect.php';
	$pwd = db_confirm($name);
	if($password!==$pwd){
		echo "Wrong, maybe you should try:\n";
		echo "Name: $name"."\n"."Password: $pwd";
	}else{
			echo "true";
	}
?>
