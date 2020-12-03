<?php
$servername = "127.0.0.1:3306";
$username = "warframe";
$password = "warframe";
$dbname = "customerDB";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT username, item, num, status, orders FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "玩家ID: " . $row["username"]. "\t"."物品名称: " . $row["item"]."\t"."数量:" . $row["num"]."\t"."B/S:".$row["status"]."<br>";
        echo "\n";
    }
} else {
    echo "当前没有交易信息";
}
$conn->close();
?>