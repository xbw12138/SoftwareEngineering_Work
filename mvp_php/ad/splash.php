<?php
    require("db_config.php");
    $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
    mysql_query("set names 'utf8'");
    mysql_select_db($mysql_database);
    $sql="select url,id from ad where id=(select max(id) from ad where type='A')";
    $rowz=mysql_fetch_row(mysql_query($sql));
    $rs['name'] = $rowz[1];
    $rs['img'] = $rowz[0];
    echo json_encode($rs);
?>
