<?php
    require_once '../lib/config.php';
    $uid = $_GET['uid'];
    $oo = new Ss\User\Ss($uid);
    //获得流量信息
    if($oo->get_transfer()<1000000)
    {
        $transfers=0;}else{ $transfers = $oo->get_transfer();
            
        }
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();

$a=$transfers." MB";
$b=$all_transfer." GB";
$c=$unused_transfer." GB";
$d=date('Y-m-d H:i:s',$unix_time);
$rs['message']="1";
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Olive Enterprise">
    <!-- END META -->
    
     <!-- BEGIN SHORTCUT ICON -->
     <link rel="shortcut icon" href="../style/img/favicon.ico">
     <!-- END SHORTCUT ICON -->
     <title>
       Olive Admin - Flat & Responsive Bootstrap Admin Template
     </title>
     <!-- BEGIN STYLESHEET-->
		<link href="../style/css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
		<link href="../style/css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
		<link href="../style/assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- FONT AWESOME ICON CSS -->
		<link href="../style/css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
		<link href="../style/css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
		<link href="../style/assets/morris.js-0.4.3/morris.css" rel="stylesheet"><!-- MORRIS CHART CSS -->
     <!--dashboard calendar-->
     <link href="../style/css/clndr.css" rel="stylesheet"><!-- CALENDER CSS -->
     <!--[if lt IE 9]>
<script src="../style/js/html5shiv.js">
</script>
<script src="../style/js/respond.min.js">
</script>
<![endif]-->
     <!-- END STYLESHEET-->
  </head>



  <body>


<center>
<div class="col-md-6">
<div class="box box-solid">
<div class="box-header">
<h3 class="box-title">签到获取流量</h3>
</div><!-- /.box-header -->
<div class="box-body">
<p> 22小时内可以签到一次。</p>
<?php  if($oo->is_able_to_check_in())  { ?>
<p id="checkin-btn"> <button id="checkin" class="btn btn-success  btn-flat">签到</button></p>
<?php  }else{ ?>
<p><a class="btn btn-success btn-flat disabled" href="#">不能签到</a> </p>
<?php  } ?>
<p id="checkin-msg" ></p>
<p>上次签到时间：<code><?php echo date('Y-m-d H:i:s',$oo->get_last_check_in_time());?></code></p>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col (right) -->
</center>




      <section id="main-content">
	  <!-- BEGIN WRAPPER  -->
        <section class="wrapper">
		  <!-- BEGIN ROW  -->
          <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-tags blue">
                  </i>
                </div>
                <div class="value"><p>已用流量</p>
                  <h3><?php echo $a; ?></h3>

                </div>
              </section>
            </div>
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-money red">
                  </i>
                </div>
                <div class="value"><p>可用流量</p>
                  <h3><?php echo $b; ?></h3>

                </div>
              </section>
            </div>
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-user yellow">
                  </i>
                </div>
                <div class="value"><p>剩余流量</p>
                  <h3><?php echo $c; ?></h3>

                </div>
              </section>
            </div>
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-shopping-cart purple">
                  </i>
                </div>
                <div class="value">
                  <h3><?php echo $d; ?></h3>

                </div>
              </section>
            </div>
          </div>
		   
    </section>
    <!-- END SECTION -->
    <!-- BEGIN JS -->
    <script src=" ../style/js/jquery-1.8.3.min.js" ></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
    <script src=" ../style/js/bootstrap.min.js" ></script><!-- BOOTSTRAP JS -->
    <script src=" ../style/js/jquery.dcjqaccordion.2.7.js"></script><!-- ACCORDIN JS -->
    <script src=" ../style/js/jquery.scrollTo.min.js" ></script><!-- SCROLLTO JS -->
    <script src=" ../style/js/jquery.nicescroll.js" ></script><!-- NICESCROLL JS -->
    <script src=" ../style/js/respond.min.js" ></script><!-- RESPOND JS -->
    <script src=" ../style/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
    <script src=" ../style/js/sparkline-chart.js"></script><!-- SPARKLINE CHART JS -->
    <script src=" ../style/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
    <script src=" ../style/js/count.js"></script><!-- COUNT JS -->
    <!--Morris-->
    <script src=" ../style/assets/morris.js-0.4.3/morris.min.js" ></script><!-- MORRIS JS -->
    <script src=" ../style/assets/morris.js-0.4.3/raphael-min.js" ></script><!-- MORRIS  JS -->
    <script src=" ../style/js/chart.js" ></script><!-- CHART JS -->
    
    <!-- END JS -->
  </body>
</html>


