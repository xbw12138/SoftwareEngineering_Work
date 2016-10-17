<?php
require_once '_main_m.php'; ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
<input type="hidden" id="uid" value="<?php echo $uid; ?>">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                信息更新
                <small>Profile Update</small>
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
                            <h3 class="box-title">网站登录密码修改</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                            <div class="box-body">

                                <div id="msg-error" class="alert alert-warning alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-warning"></i> 出错了!</h4>
                                    <p id="msg-error-p"></p>
                                </div>

                                <div id="msg-success" class="alert alert-info alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Ok!</h4>
                                    <p id="msg-success-p"></p>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="当前密码(必填)" id="nowpwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="新密码" id="pwd">
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="确认密码" class="form-control" id="repwd">
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" id="pwd-update" class="btn btn-primary">修改</button>
                            </div>

                    </div><!-- /.box -->
                </div>

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <i class="fa fa-align-left"></i>
                            <h3 class="box-title">Shadowsocks连接密码修改</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                                <div id="ss-msg-success" class="alert alert-info alert-dismissable" style="display:none" >
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> 修改成功!</h4>
                                    <p id="ss-msg-success-p"></p>
                                </div>



                                <div class="form-group">
                                    <input type="text" id="sspwd" placeholder="输入新密码" class="form-control"  >
                                </div>

                                <div class="box-footer">
                                    <button type="submit" id="ss-pwd-update" class="btn btn-primary"  >修改 </button>
                                </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<script src="http://ecfun.cc/mvp/asset/js/jQuery.min.js"></script>
<script>
    $("#msg-success").hide();
    $("#msg-error").hide();
    $("#ss-msg-success").hide();
</script>

<script>
    $(document).ready(function(){
        var uid=$("#uid").val();
        $("#pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_pwd_update_m.php",
                dataType:"json",
                data:{
                    nowpwd: $("#nowpwd").val(),
                    pwd: $("#pwd").val(),
                    repwd: $("#repwd").val(),
                    uid: $("#uid").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#msg-error").hide();
                        $("#msg-success").show();
                        $("#msg-success-p").html(data.msg);
                        //window.open("http://ecfun.cc/mvp/danmu/finish.php?uid="+uid,'top');
                        //window.setTimeout("location.href='../danmu/finish.php?uid="+uid, 1000);
                        window.setTimeout("location.href='login.php'", 1000);
                    }else{
                        $("#msg-error").show();
                        $("#msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                    // 在控制台输出错误信息
                    console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function(){
        var uid=$("#uid").val();
        $("#ss-pwd-update").click(function(){
            $.ajax({
                type:"POST",
                url:"_sspwd_update_m.php",
                dataType:"json",
                data:{
                    sspwd: $("#sspwd").val(),
                    uid: $("#uid").val()
                },
                success:function(data){
                    if(data.ok){
                        $("#ss-msg-success").show();
                        $("#ss-msg-success-p").html(data.msg);
                        //window.open("http://ecfun.cc/mvp/danmu/finish.php?uid="+uid,'top');
                        //console.log("location.href='../danmu/finish.php?uid='"+uid);
                        //window.setTimeout("location.href='../danmu/finish.php?uid="+uid, 1000);
                        window.setTimeout("location.href='login.php'", 1000);
                    }else{
                        $("#ss-msg-error").show();
                        $("#ss-msg-error-p").html(data.msg);
                    }
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                    // 在控制台输出错误信息
                    console.log(removeHTMLTag(jqXHR.responseText));
                }
            })
        })
    })
</script>

<script type="text/javascript">
            // 过滤HTML标签以及&nbsp 来自：http://www.cnblogs.com/liszt/archive/2011/08/16/2140007.html
            function removeHTMLTag(str) {
                    str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
                    str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
                    str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
                    str = str.replace(/&nbsp;/ig,'');//去掉&nbsp;
                    return str;
            }
</script>