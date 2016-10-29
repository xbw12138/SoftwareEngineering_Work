<?php
require_once '_main.php';

$invite = new \Ss\User\Invite($uid);
$code = $invite->CodeArray();
?>
<head>
    <meta charset="UTF-8">
    <title>广告平台</title>
    <link href="../../qiniu/demo/images/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="../../qiniu/demo/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../qiniu/demo/styles/main.css">
    <link rel="stylesheet" href="../../qiniu/demo/styles/highlight.css">
    <script type="text/javascript" src="../../qiniu/demo/bower_components/jquery/jquery.min.js"></script>
    <!--[if lt IE 9]>
      <script src="bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                广告投放
                <small>AD</small>
            </h1>
        </section>


 <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">


    <div class="container" style="padding-top: 60px;">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#demo" id="demo-tab" role="tab" data-toggle="tab" aria-controls="demo" aria-expanded="true">广告</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="demo" aria-labelledby="demo-tab">

                <div class="row" style="margin-top: 20px;">
                    <input type="hidden" id="domain" value="<?php echo 'http://img.ecfun.cc/'; ?>">
                    <input type="hidden" id="uptoken_url" value="<?php echo '../../qiniu/token/upload_token.php'; ?>">
                    <ul class="tip col-md-12 text-mute">
                    
                        <li>
                            <small>临时上传的空间不定时清空，请勿保存重要文件。</small>
                        </li>
                        <li>
                            <small>Html5模式大于4M文件采用分块上传。</small>
                        </li>
                        <li>
                            <small>上传图片可查看处理效果。</small>
                        </li>
                        <li>
                            <small>本示例限制最大上传文件100M。</small>
                        </li>
                    </ul>
                    <div class="col-md-12">
                        <div id="container">
                            <a class="btn btn-default btn-lg " id="pickfiles" href="#" >
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>选择文件</span>
                            </a>
                        </div>
                    </div>
                    <div style="display:none" id="success" class="col-md-12">
                        <div class="alert-success">
                            队列全部文件处理完毕
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table table-striped table-hover text-left"   style="margin-top:40px;display:none">
                            <thead>
                              <tr>
                                <th class="col-md-4">文件名</th>
                                <th class="col-md-2">大小</th>
                                <th class="col-md-4">细节</th>
                                <th class="col-md-2">广告</th>
                              </tr>
                            </thead>
                            <tbody id="fsUploadProgress">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><!-- /.content-wrapper -->
</div>
</div>
</section>
<script>

function displayHideUI()
{
    var ui =document.getElementById("upup");
    ui.style.display="none";
}
                  function uploadxu(){
                    $.ajax({
                         type:"GET",
                         url:"../ad/adsplash.php",
                         dataType:"json",
                         data:{
                         url: $('#uurl').val(),
                         type: $('#select option:selected') .val()
                         },
                         success:function(data){
                           alert($('#select option:selected') .val()+"上传成功");
                           displayHideUI();
                           console.log("zhengque");
                         },
                         error:function(jqXHR){
                           alert($('#select option:selected') .val()+"上传失败");
                         // 在控制台输出错误信息
                         console.log("cuowu");
                         }
                         });
                  }
</script>



<script type="text/javascript" src="../../qiniu/demo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../qiniu/demo/bower_components/plupload/js/moxie.js"></script>
<script type="text/javascript" src="../../qiniu/demo/bower_components/plupload/js/plupload.dev.js"></script>
<!-- <script type="text/javascript" src="bower_components/plupload/js/plupload.full.min.js"></script> -->
<script type="text/javascript" src="../../qiniu/demo/bower_components/plupload/js/i18n/zh_CN.js"></script>
<script type="text/javascript" src="../../qiniu/demo/scripts/ui.js"></script>
<script type="text/javascript" src="../../qiniu/demo/src/qiniu.js"></script>
<script type="text/javascript" src="../../qiniu/demo/scripts/highlight.js"></script>
<script type="text/javascript" src="../../qiniu/demo/scripts/main.js"></script>
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>


       
    
<?php
require_once '_footer.php'; ?>





