<?php
$servername = "127.0.0.1:3306";
$username = "warframe";
$password = "warframe";
$dbname = "itemsPrice";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$namezh = $_POST["namezh"];
$nameen = $_POST["nameen"];
if($namezh){
    $result = mysqli_query($conn,"SELECT * FROM items_dict
WHERE zh ='$namezh'");
    $row = mysqli_fetch_array($result);
    echo $row["en"];
}
else
    $result = mysqli_query($conn,"SELECT * FROM items_dict
WHERE en ='$nameen'");
$row = mysqli_fetch_array($result);
echo $row["zh"];
$conn->close();
?>




