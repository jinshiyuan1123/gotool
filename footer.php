<?php
if ($id) {mores($as['tools_url'],$navs,Tools_url.'/'.$CONF['config']['TOOLS_T']);}
?>
<!--footer start-->
<footer class="footer text-center">
  <div>

    Copyright <a href="#" target="_blank">Youngxj</a> 2018 - <?php echo $tools_settings['icp'];?>  <a href="<?php echo Tools_url;?>/log.php" target="_blank">时间轴</a> <a href="<?php echo Tools_url;?>/about.php" target="_blank">关于</a>
  </div>
  <div class="hitokoto">
   <script>function binduyan(){document.write(' 娱乐网.共享发布');}</script>
   <script>binduyan()</script>
 </div>
 <div class="footer text-center">
  <!--这里可以放统计代码-->
  <?php echo $tools_settings['footer'];?>
</div>
<div id="f_list">

  <a rel="noopener noreferrer" target="_blank" class="btn qq-qun copy-btn js-tip" title="QQ" href="tencent://AddContact/?fromId=45&fromSubId=1&subcmd=all&uin=2824030364&website=www.oicqzone.com" original-title="Q: 2824030364"><i class="fa fa-qq "></i></a>
 
  <?php if($tools_settings['templates']==0){?><a rel="noopener noreferrer" target="_blank" class="btn weibo js-tip" href="javascript:temp();" title="切换主题"><i class="fa fa-television"></i></a><?php }?>
  <?php if($tools_priority=='1'){?>
    <a rel="noopener noreferrer" target="_blank" class="btn weibo js-tip" href="javascript:priority();" title="切换排序"><i class="fa fa-cog fa-spin"></i></a>
  <?php }?>
 
  <a class="btn gotop js-tip" href="javascript:gotop();" title="返回顶部" id="gotop"><i class="fa fa-arrow-up"></i></a>
</div>
<style type="text/css">
#welcome{width:200px;background:#fff;border:1px solid #eee;color:#000;font-size:14px;opacity:0.7;filter:alpha(opacity=70);padding:10px 20px;position:fixed;right:10px;bottom:25px;z-index:99999;box-shadow:rgb(136,123,123) 3px 2px 5px;opacity:1;}
#welcome h4{color:#F00; line-height:30px; padding:0!important;margin:0!important;text-align:left;}
.closebox{float:center;text-align:center;margin-top:10px;}
</style>
<?php if(isset($tools_settings['notice'])&&$tools_settings['notice']!==''){?>
  <div id="welcome" <?php if($_COOKIE['web_Notice']=='1'){echo 'style="display:none;"';}?>>
    <h4>公告:</h4>
    <script>
      //公告自动关闭控制1->自动关闭;0->不关闭
      var ex = '1';
      //公告自动关闭延时:1秒=1000;
      var extime = '10000';
      if (ex == 1) {
        setTimeout(function() {
          if (document.all) {
            document.getElementById("clickMe").click()
          } else {
            var e = document.createEvent("MouseEvents");
            e.initEvent("click", true, true);
            document.getElementById("clickMe").dispatchEvent(e)
          }
        },extime);
      }
    </script>
    <?php echo $tools_settings['notice'];?>
    <div class="closebox">
      <a href="javascript:void(0)" onclick="$('#welcome').slideUp('slow');$('.closebox').css('display','none');setCookie('web_Notice','1','1');" title="今天不再提醒" id="clickMe">不再提醒</a>
    </div>
  </div>
<?php }?>
</footer>
</body>
</html>