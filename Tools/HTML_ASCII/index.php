<?php
/*
Title:文本转ASCII
Subtitle:HTML ASCII
Plugin Name:HTML_ASCII
Description:Html转文本转ASCII
Author:Youngxj
Author Email:blog@youngxj.cn
Author URL:#
Version:1.1
*/
$CONF = require('../../function.config.php');
$self = $_SERVER['PHP_SELF'];
preg_match_all('/'.$CONF['config']['TOOLS_T'].'\/(.*)\//', $self, $name);
$id = $name[1][0];
include '../../header.php';
?>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></h3>
    </div>
    <div class="panel-body">
      <div class="col-md-6 col-md-offset-3">
        <form role="form" onsubmit="return false;">
          <div class="form-group">
            <textarea class="form-control" rows="3" id="html_content" placeholder="输入文本"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-default btn-lg btn-block" onclick="return email2ascii();">转换</button>
          </div>
        </form>
        <div class="form-group">
          <div class="alert alert-success" role="alert" id="ascii_text" style="word-wrap : break-word ;">请输入文本进行转换</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function email2ascii(){

    var s = document.getElementById('html_content').value;
    var as = "";
    for(var a = 0; a<s.length; a++){
      as += "&amp;#"+s.charCodeAt(a)+";";
    }
    document.getElementById('ascii_text').innerHTML = '' + as;
    return false;
  }
</script>
<?php include '../../footer.php';?>