
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
$name = $_POST["name"];
$type = $_GET["type"];

//echo $name;
//echo $type;
$sum = 1;
echo '<div style="background-color: #b2d6f2;text-align: center">
                <h2>这是查询到的结果</h2>
                <p>这个价格仅代表一段时间内交易的价格，并不是最低价。想查看最低价请点击后面的“点此查看实时价格”按钮。</p>
                <p>如果未显示任何结果，请核对你所搜索的物品名称，或者对此进行反馈。</p>
            </div>';
$result = mysqli_query($conn,"SELECT * FROM all_items
WHERE namezh ='$name'");
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
        elseif ($row['types']=='barrel'){
            $types="枪管";
        }
        elseif ($row['types']=='receiver'){
            $types="枪机";
        }
        elseif ($row['types']=='stock'){
            $types="枪托";}

        else{$types="无";}


        echo "<table style='text-align: center; background-color: #b2d6f2;font-size: 18px' cellpadding=\"10\">
<tr>
<td>名称:{$row['namezh']}</td>
<td>部位：{$types}</td>
<td>价格：{$row['price']}</td>
<td><a href='{$row['location']}' title=''>点此查看实时价格</a></td>
<td><a href='../store.html' title=''>点此返回神秘商店</a></td>
</tr>
</table>";
}

$conn->close();
?>




