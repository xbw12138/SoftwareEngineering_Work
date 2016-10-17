<?php
require_once '../lib/config.php';
//require_once '_check.php';
$uid = $_POST['uid'];
$oo = new Ss\User\Ss($uid);
// $pwd = $_POST['sspwd'];
if($_POST['sspwd'] == ''){
    $pwd = \Ss\Etc\Comm::get_random_char(8);
}else{
    $pwd = $_POST['sspwd'];
    $pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
    $pwd = \Ss\Etc\Comm::checkHtml($pwd);
}
$oo->update_ss_pass($pwd);
$a['ok'] = '1';
$a['msg'] = "新密码为".$pwd;
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
    access_url("http://ecfun.cc/mvp/danmu/finish.php?uid=".$uid);*/
    //$content = file_get_contents("http://ecfun.cc/mvp/danmu/finish.php?uid=".$uid);
    //header("Location:../danmu/finish.php?uid=".$uid);
    
echo json_encode($a);
