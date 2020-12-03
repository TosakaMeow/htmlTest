<?php
$servername = "127.0.0.1:3306";
$username = "warframe";
$password = "warframe";
$dbname = "customerDB";

$name = $_POST["user"];
$item = $_POST["item"];
$num = $_POST["num"];
$think = $_POST["th"];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$dates = date(ymdhis);
$sql = "INSERT INTO MyGuests (username, item, num, status, orders)
VALUES ( '$name', '$item', '$num', '$think', $dates)";

if ($conn->query($sql) === TRUE) {
    echo "你的交易请求已成功提交，请等待回应！";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>