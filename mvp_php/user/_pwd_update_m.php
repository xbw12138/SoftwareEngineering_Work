<?php
require_once '../lib/config.php';
//require_once '_check.php';
$U = new \Ss\User\UserInfo($_POST['uid']);
$nowpwd = $_POST['nowpwd'];
$pwd = $_POST['pwd'];
$repwd = $_POST['repwd'];

$nowpwd = \Ss\User\Comm::SsPW($nowpwd);
if($U->GetPasswd() != $nowpwd) {
    $a['error'] = '1';
    $a['msg'] = "密码错误";
}elseif($pwd != $repwd){
    $a['error'] = '1';
    $a['msg'] = "两次密码输入不同";
}elseif(strlen($pwd)<8){
    $a['error'] = '1';
    $a['msg'] = "密码太短啦";
}else{
    $a['ok'] = '1';
    $a['msg'] = "修改成功";
    $pwd = \Ss\User\Comm::SsPW($pwd);
    $U->UpdatePwd($pwd);
}
//echo
    /*function access_url($url) {
        if ($url=='') return false;
        $fp = fopen($url, 'r') or exit('Open url faild!');
        if($fp){
            while(!feof($fp)) {
                $file.=fgets($fp)."";
            }
            fclose($fp);
        }
        return $file;
    }
    access_url("http://ecfun.cc/mvp/danmu/finish.php?uid=".$_POST['uid']);*/
    //$content = file_get_contents("http://ecfun.cc/mvp/danmu/finish.php?uid=".$_POST['uid']);
    //header("Location:../danmu/finish.php?uid=".$uid);
echo json_encode($a);
