<?php
    require_once 'lib/config.php';
    include_once 'header.php';
    $c = new \Ss\User\Invite();
    ?>
<style>
#sub{width:100px;height:35px;line-height:35px;background:#FD8E26 url(背景图片地址) no-repeat;border:none;}
#sub:hover{border-bottom:solid 1px #333;}
</style>
<div class="section no-pad-bot" id="index-banner">
<div class="container">
<br><br>
<div class="row center">
<h5>CSDN 访问量助力</h5>
</div>
</div>
</div>


<div class="container">
<div class="section">
<!--   Icon Section   -->
<div class="row">
<div class="row marketing">


<form action="http://ecfun.cc/mvp/blog.php" method="get">
<p>CSDN ID: <input type="text" name="id" /></p>
<center>
<input type="submit" value="确定" id="sub"/><br>
</center>
</form>
<center>
<p>CSDN ID 如图</p>
<img src="http://img.ecfun.cc/id.png?attname=&e=1475599236&token=DnaAnYC59MiINvUeZssSjfNq2_dPVnw9KQ82Tvyo:ObgyqEObtnN0oHC_RgNjPDtERCs" />
</center>


<br><br><br>

<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="555" data-title="xbw" data-url="http://ecfun.cc/mvp/csdn.php"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"mvp"};
(function() {
 var ds = document.createElement('script');
 ds.type = 'text/javascript';ds.async = true;
 ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
 ds.charset = 'UTF-8';
 (document.getElementsByTagName('head')[0]
  || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
</script>
<!-- 多说公共JS代码 end -->

</center>

</div>
</div>
</div>
<br>
</div>
<?php  include_once 'ana.php';
    include_once 'footer.php';?>
