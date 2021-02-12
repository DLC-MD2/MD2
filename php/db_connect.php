<?php
function db_confirm($name){
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "EasyNews";
$port = "3306";
// 创建连接 如果直接输入
$conn = new mysqli($servername, $username, $password, $dbName, $port);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
//echo "Connect Successfully";
// 创建数据库
//$sql = "CREATE DATABASE myDB";
//if ($conn->query($sql) === TRUE) {
//  echo "数据库创建成功";
//} else {
//  echo "Error creating database: <br>" . $conn->error;
//}

// 使用 sql 创建数据表
//$sql = "CREATE TABLE Users (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//login VARCHAR(30) NOT NULL,
//password VARCHAR(30) NOT NULL
//)";
//if ($conn->query($sql) === TRUE) {
//  echo "Table Users created successfully";
//} else {
//  echo "创建数据表错误: " . $conn->error;
//}

// 插入数据
//$sql = "INSERT INTO Users (login, password)
//VALUES ('iconoclast', 'Chow')";
//
//if ($conn->multi_query($sql) === TRUE) {
//  echo "新记录插入成功";
//} else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
//}

// 更新并查询数据
//$sql = "UPDATE Users SET password='1234567890' WHERE login='iconoclast'";
//$conn->query($sql);
$sql = "SELECT * FROM Users WHERE login='$name'";
$result = $conn->query($sql);
   
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) { 
    	// assoc将多条数据放在关联数组里面，用于while判断有数据，就逐条输出
//      echo "<br>Login Name: " . $row["login"]. "<br>Password: " . $row["password"]. "<br>";
//      	echo $row['password'];
        	return $row["password"]; 	
    }
} else {
    echo "没有结果";
}

// 删除数据："DELETE FROM Persons WHERE LastName='Griffin'"
$conn->close();
}
function db_register($login, $pwd){
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "EasyNews";
$port = "3306";
// 创建连接 如果直接输入
$conn = new mysqli($servername, $username, $password, $dbName, $port);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "Connect Successfully";
// 插入数据
$sql = "INSERT INTO Users (login, password) VALUES ('$login', '$pwd')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

function db_telNumber($key){
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "EasyNews";
$port = "3306";
// 创建连接 如果直接输入
$conn = new mysqli($servername, $username, $password, $dbName, $port);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$sql = "SELECT * FROM contacts WHERE name='$key'";
$result = $conn->query($sql);
   
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) { 
    	// assoc将多条数据放在关联数组里面，用于while判断有数据，就逐条输出
//      echo "<br>Login Name: " . $row["login"]. "<br>Password: " . $row["password"]. "<br>";
        	return $row["tel"];
        	
    }
} else {
    echo "没有结果";
}
$conn->close();
}
?>


