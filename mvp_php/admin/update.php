<?php
require_once '_main.php';

$invite = new \Ss\User\Invite($uid);
$code = $invite->CodeArray();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                版本更新
                <small>Update</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">添加邀请码</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="get" action="http://ecfun.cc/mvp/danmu/danmu.php">
                            <div class="box-body">

                                
                                    <input  type="hidden" name="title" value="token_1076351865_Update"  >
                               
                                <div class="form-group">
                                    <label for="cate_title">更新内容</label>
                                    <input  class="form-control" name="content"  >
                                </div>

                    

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                            </div>

                        </form>
                    </div>
                </div><!-- /.box -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require_once '_footer.php'; ?>
