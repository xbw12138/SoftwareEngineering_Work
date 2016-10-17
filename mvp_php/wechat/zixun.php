<?php
include_once 'header.php';
require_once 'user/_main.php';
//require_once 'lib/yanzhenguser.php';
require("lib/db_config.php");
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) 
or die("error connecting") ;
mysql_query("set names 'utf8'"); 
mysql_select_db($mysql_database);
//$user_phone=$_SESSION['username'];
$page=(int)$_GET['page'];
$rowz=mysql_fetch_row(mysql_query("select count(*) from yixieshi"));
$num=$rowz[0]-$page*10;
$i=1;
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                冰糖资讯
                <small>News List</small>
            </h1>
        </section>
		
        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-th-list"></i>
                            <h3 class="box-title">一些事</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
							if($num>=0){
							$sql="select url,title,content,time from yixieshi limit $num , 10";
                            if($result=mysql_query($sql)){
								while($row=mysql_fetch_array($result)){		
                                ?>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <p> 
											<?php echo $row['1']; ?><br>

<code><a href="<?php echo $row['0']; ?>" ><?php echo $row['2']; ?></a></code><br>
											
                                            </p>
                                            <p align="right"><?php echo $row['3']; ?></p>
											
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
							<?php }}} ?>
                        </div><!-- /.box-body -->
<div class="callout callout-warning">
<center>
<?php if($page!=1){ ?>
<a class="btn btn-primary" style="text-decoration: none;" href="zixun.php?page=<?php echo $page-1; ?> " >上一页</a>
<?php } ?>
<a class="btn btn-primary" style="text-decoration: none;" href="zixun.php?page=<?php echo $page+1; ?> " >下一页</a>
</center>

</div>

                    </div><!-- /.box -->
                </div><!-- /.col (left) -->
 
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
