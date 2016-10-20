<?php
    require("db_config.php");
    $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
    mysql_query("set names 'utf8'");
    mysql_select_db($mysql_database);
    $sql="select url,name from ad";
    $rowz=mysql_fetch_row(mysql_query($sql));
    $rs['name'] = $rowz[1];
    $rs['img'] = $rowz[0];
    //$rs['img'] = "http://img.blog.csdn.net/20161021000000845";
    echo json_encode($rs);
?>
