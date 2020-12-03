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
$name = $_GET["warframe"];
$type = $_GET["type"];

//echo $name;
//echo $type;
$result = mysqli_query($conn,"SELECT * FROM warframes
WHERE name='$name'");
$row = mysqli_fetch_array($result);
$sum=0;
while($row = mysqli_fetch_array($result))
{
    if($row['types']=='set'){
        $types="整套";
    }
    elseif ($row['types']=='chassis'){
        $types="机体";
    }
    elseif ($row['types']=='systems'){
        $types="系统";
    }
    elseif ($row['types']=='blueprint'){
        $types="蓝图";
    }
    elseif ($row['types']=='neuroptics'){
        $types="头部";
    }
    echo "<table style='text-align: left; font-size: 18px' cellpadding=\"10\">
<tr>
<td>战甲名称:{$row['name']}-Prime</td>
<td>部位：{$types}</td>
<td>价格：{$row['price']}</td>
<td><a href='{$row['location']}' title=''>点此查看实时价格</a></td>
</tr>
</table>";
    echo "<br>";
    $sum=$sum+$row['price'];
}
echo "总价格：".$sum;
$conn->close();
?>



