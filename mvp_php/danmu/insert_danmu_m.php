<?php
$response = array();
require("db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
if (isset($_GET['user_phone'])&&isset($_GET['danmu_content'])) {
    $user_phone = $_GET['user_phone'];
    $danmu_content = $_GET['danmu_content'];
    $result = "INSERT INTO danmu(user_phone,danmu_content) VALUES('$user_phone','$danmu_content')";
	mysql_query($result);
    header("Location:../wechat/danmu.php?page=1&uid=".$_GET['user_phone']);
} else {
    header("Location:../wechat/danmu.php?page=1&uid=".$_GET['user_phone']);
}
?>
