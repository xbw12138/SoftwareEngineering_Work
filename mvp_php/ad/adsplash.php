<?php
    require("db_config.php");
    $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
    mysql_query("set names 'utf8'");
    mysql_select_db($mysql_database);
    $a=$_GET['url'];
    $b=$_GET['type'];
    $sql = "INSERT INTO ad(url,img,type)VALUES('$a','$a' ,'$b')";
    mysql_query($sql);
    $rs['ok'] = '1';
    echo json_encode($rs);
?>
