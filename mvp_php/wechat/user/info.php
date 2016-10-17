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
     <link rel="shortcut icon" href="img/favicon.ico">
     <!-- END SHORTCUT ICON -->
     <title>
       Olive Admin - Flat & Responsive Bootstrap Admin Template
     </title>
     <!-- BEGIN STYLESHEET-->
		<link href="css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- FONT AWESOME ICON CSS -->
		<link href="css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
		<link href="css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
		<link href="assets/morris.js-0.4.3/morris.css" rel="stylesheet"><!-- MORRIS CHART CSS -->
     <!--dashboard calendar-->
     <link href="css/clndr.css" rel="stylesheet"><!-- CALENDER CSS -->
     <!--[if lt IE 9]>
<script src="js/html5shiv.js">
</script>
<script src="js/respond.min.js">
</script>
<![endif]-->
     <!-- END STYLESHEET-->
  </head>
  <body>
  
      
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
                <div class="value">
                  <h1 class="count">
                    <?php echo $a; ?>
                  </h1>
                  <p>
                    以用流量
                  </p>
                </div>
              </section>
            </div>
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-money red">
                  </i>
                </div>
                <div class="value">
                  <h1 class=" count2">
                    <?php echo $b; ?>
                  </h1>
                  <p>
                    可用流量
                  </p>
                </div>
              </section>
            </div>
            <div class="col-lg-3 col-sm-6">
              <section class="panel">
                <div class="symbol">
                  <i class="fa fa-user yellow">
                  </i>
                </div>
                <div class="value">
                  <h1 class=" count3">
                    <?php echo $c; ?>
                  </h1>
                  <p>
                    剩余流量
                  </p>
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
                  <h1 class=" count4">
                    <?php echo $d; ?>
                  </h1>
                  <p>
                    最后使用时间
                  </p>
                </div>
              </section>
            </div>
          </div>
		   
    </section>
    <!-- END SECTION -->
    <!-- BEGIN JS -->
    <script src="js/jquery-1.8.3.min.js" ></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
    <script src="js/bootstrap.min.js" ></script><!-- BOOTSTRAP JS -->
    <script src="js/jquery.dcjqaccordion.2.7.js"></script><!-- ACCORDIN JS -->
    <script src="js/jquery.scrollTo.min.js" ></script><!-- SCROLLTO JS -->
    <script src="js/jquery.nicescroll.js" ></script><!-- NICESCROLL JS -->
    <script src="js/respond.min.js" ></script><!-- RESPOND JS -->
    <script src="js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
    <script src="js/sparkline-chart.js"></script><!-- SPARKLINE CHART JS -->
    <script src="js/common-scripts.js"></script><!-- BASIC COMMON JS -->
    <script src="js/count.js"></script><!-- COUNT JS -->
    <!--Morris-->
    <script src="assets/morris.js-0.4.3/morris.min.js" ></script><!-- MORRIS JS -->
    <script src="assets/morris.js-0.4.3/raphael-min.js" ></script><!-- MORRIS  JS -->
    <script src="js/chart.js" ></script><!-- CHART JS -->
    <!--Calendar-->
    <script src="js/calendar/clndr.js"></script><!-- CALENDER JS -->
    <script src="js/calendar/evnt.calendar.init.js"></script><!-- CALENDER EVENT JS -->
    <script src="js/calendar/moment-2.2.1.js"></script><!-- CALENDER MOMENT JS -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script><!-- UNDERSCORE JS -->
    <script src="assets/jquery-knob/js/jquery.knob.js" ></script><!-- JQUERY KNOB JS -->
    <script >
      //knob
      $(".knob").knob();
      
    </script>
    <!-- END JS -->
  </body>
</html>


