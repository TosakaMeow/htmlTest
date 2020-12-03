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
$name = $_GET["mod"];


//echo $name;
//echo $type;
$result = mysqli_query($conn,"SELECT * FROM mods
WHERE name='$name'");
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result))
{
    echo "<table style='text-align: left; font-size: 18px' cellpadding=\"10\">
<tr>
<td>MOD名称:{$row['namezh']}-Prime</td>
<td>价格：{$row['price']}</td>
<td><a href='{$row['location']}' title=''>点此查看实时价格</a></td>
</tr>
</table>";
}
$conn->close();
?>



