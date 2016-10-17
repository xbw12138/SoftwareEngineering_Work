<?php
    require_once ('XingeApp.php');
    require("db_config.php");
    $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ;
    mysql_query("set names 'utf8'");
    mysql_select_db($mysql_database);
    if (isset($_GET['uid'])){
        $uid = $_GET['uid'];
        $sql="select user_token from user where uid='$uid'";
        $row = mysql_fetch_array(mysql_query($sql));
        var_dump(DemoPushSingleDeviceMessage($row[0]));
    }
    if (isset($_GET['title'])&&isset($_GET['content'])){
        $user = $_GET['title'];
        $content = $_GET['content'];
        var_dump(DemoPushAllDeviceMessage($user,$content));
    }
    //所有设备下发透传消息       注：透传消息默认不展示
    function DemoPushAllDeviceMessage($user,$content)
    {
        $push = new XingeApp(2100215888, '833c9faccd7c14c519e9fc5e64b6108a');
        $mess = new Message();
        $mess->setTitle($user);
        $mess->setContent($content);
        $mess->setType(Message::TYPE_MESSAGE);
        $ret = $push->PushAllDevices(0, $mess);
        return $ret;
    }
    //单个设备下发透传消息       注：透传消息默认不展示
    function DemoPushSingleDeviceMessage($token)
    {
        $push = new XingeApp(2100215888, '833c9faccd7c14c519e9fc5e64b6108a');
        $mess = new Message();
        $mess->setTitle('token_1076351865');
        $mess->setContent('finish');
        $mess->setType(Message::TYPE_MESSAGE);
        $ret = $push->PushSingleDevice($token, $mess);
        return $ret;
    }
