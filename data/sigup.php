
<?php
$servername = "127.0.0.1:3306";
$username = "warframe";
$password = "warframe";
$dbname = "login";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$account = $_POST["account"];
$password = $_POST["password"];

//echo $name;
//echo $type;

$result = mysqli_query($conn,"INSERT INTO users (account, password) VALUES ('$account', '$password')");
$row = mysqli_fetch_array($result);
if($row['password']==$password)
{
    echo '{"account": "'.$account.'", "remember": "1"}';
}
else
    echo '{"account": "'.$account.'", "remember": "0"}';
$conn->close();
?>




