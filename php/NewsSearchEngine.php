<?php
$keyword = isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '';
$opration = isset($_POST['opration']) ? htmlspecialchars($_POST['opration']) : '';
echo '操作: ' . $opration;
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "toutiao";
$port = "3306";
// 创建连接 如果直接输入
$conn = new mysqli($servername, $username, $password, $dbName, $port);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
//echo "Connect Successfully";

$sql = "SELECT * FROM toutiao_details WHERE tag LIKE '%$keyword%'";
$result = $conn->query($sql);
$count = $result->num_rows;

//打开文件读入数据
$myfile = fopen("result.txt", "w") or die("Unable to open file!");
$txt = '{"code":0,"msg":"","count":'.$count.',"data":[';
fwrite($myfile, $txt);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) { 
    	// assoc将多条数据放在关联数组里面，用于while判断有数据，就逐条输出
    	$txt = '{"title":"'.$row["title"].'","date":"'.$row["date"].'","tag":"'.$row["tag"].'","url":"'.$row["url"].'","content":"'.$row["content-"].'"},';
    fwrite($myfile, $txt);
    }
} else {
    echo "没有结果";
}
$txt = '{"title":"'.$row["title"].'","date":"'.$row["date"].'","tag":"'.$row["tag"].'","url":"'.$row["url"].'","content":"'.$row["conten-"].'"}';
fwrite($myfile, $txt);
$txt = ']}';
fwrite($myfile, $txt);
fclose($myfile);

$conn->close();
?>