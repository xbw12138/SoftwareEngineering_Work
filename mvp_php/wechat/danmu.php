<?php
require("lib/db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password)
or die("error connecting") ;
mysql_query("set names 'utf8'");
mysql_select_db($mysql_database);
$uid=$_GET['uid'];
$page=(int)$_GET['page'];
$rowz=mysql_fetch_row(mysql_query("select count(*) from danmu"));
$num=$rowz[0]-$page*10;
$totalpage=$rowz[0]%10;
    if($totalpage!=0){
        $totalpage=$rowz[0]/10+1;
    }else{
        $totalpage=$rowz[0]/10;
    }
$i=1;
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Olive Enterprise">
    <!-- END META -->
    
    <!-- BEGIN SHORTCUT ICON -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- END SHORTCUT ICON -->
    
    
    <title>
      Widget
    </title>
    
    <!-- BEGIN STYLESHEET -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
    <link href="css/style-responsive.css" rel="stylesheet"><!-- THEME BASIC RESPONSIVE  CSS -->
    <!--[if lt IE 9]>
<script src="js/html5shiv.js">
</script>
<script src="js/respond.min.js">
</script>
<![endif]-->
     <!-- END STYLESHEET -->
     
  </head>
  <body>


      <div class="col-lg-6">
          <!-- START PANEL -->


          <section class="panel">
              <div class="panel-body">
                  <div class="timeline-messages">



                      <?php
                          if($num>=0){
                              $sql="select user_phone,danmu_content,time from danmu limit $num , 10";
                              if($result=mysql_query($sql)){
                                  while($row=mysql_fetch_array($result)){
                                  ?>

                      
                      <div class="msg-time-chat">
                          <a href="#" class="message-img">
                              <img class="avatar" src="img/chat-avatar.jpg" alt="">
                                  </a>
                          <div class="message-body msg-in">
                              <div class="text">
                                  <p class="attribution">
                                  <a href="#">
                                      <?php echo $row['0']; ?>
                                  </a>
                                  <?php echo $row['2']; ?>
                                  </p>
                                  <p>
                                  <?php echo $row['1']; ?>
                                  </p>
                              </div>
                          </div>
                      </div>
                      <?php }}} ?>
                  </div>
                  <div class="chat-form">
                    <?php if($page!=1){ ?>
                    <div class="form-group">
                        <div class="pull-left chat-features">
                            <a class="btn btn-info btn-lg" href="danmu.php?page=<?php echo $page-1; ?>&uid=<?php echo $uid; ?> ">
                                上一页
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="input-cont "> -->
                     <!--     <input type="text" class="form-control col-lg-12" placeholder="Type a message here...">  -->
                     <!--        </div>  -->
                    <?php if($page!=$totalpage){ ?>
                      <div class="form-group">
                          <div class="pull-right chat-features">
                              <a class="btn btn-info btn-lg" href="danmu.php?page=<?php echo $page+1; ?>&uid=<?php echo $uid; ?> ">
                                  下一页
                              </a>
                          </div>
                      </div>
                    <?php } ?>

<br><br>

<div class="chat-form">
<div class="input-cont ">
<input type="text" id="danmu" class="form-control col-lg-12" placeholder="说点啥吧……">
<input type="hidden" id="sss"  class="form-control col-lg-12" placeholder="说点啥吧……">
</div>
<div class="form-group">

<div class="pull-left chat-features">
<a class="btn btn-info btn-lg" href="javascript:openURL('http://ecfun.cc/mvp/danmu/insert_danmu_m.php?user_phone=<?php echo $uid; ?>&danmu_content=');">
Send
</a>
</div>
</div>
</div>



                  </div>

              </div>

</section>
          <!-- END PANEL -->
      </div>
      <!-- END ROW -->

      <!-- BEGIN JS -->
      <script src="js/jquery.js" ></script><!-- BASIC JS LIABRARY -->
      <script src="js/bootstrap.min.js" ></script><!-- BOOTSTRAP JS  -->
    <script src="js/jquery.dcjqaccordion.2.7.js"></script><!-- ACCORDING JS -->
    <script src="js/jquery.scrollTo.min.js" ></script><!-- SCROLLTO JS  -->
    <script src="js/jquery.nicescroll.js" > </script><!-- NICESCROLL JS  -->
    <script src="js/respond.min.js" ></script><!-- RESPOND JS  -->
    <script src="js/common-scripts.js" ></script><!-- BASIC COMMON JS  -->
<script>
   function openURL(url){
       var danmu=$("#danmu").val();
       $("#sss").attr('value',url+danmu);
       var cao=$("#sss").val();
       window.open(cao,'top');
       //console.log(cao);
       
       } </script>
    <!-- END  JQUERY -->
  </body>
</html>

