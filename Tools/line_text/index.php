<?php
/*
Title:线条字生成
Subtitle:Line Text
Plugin Name:line_text
Description:线条字生成
Author:Youngxj
Author Email:blog@youngxj.cn
Author URL:#
Version:1.1
*/
$CONF = require('../../function.config.php');
$self = $_SERVER['PHP_SELF'];
preg_match_all('/'.$CONF['config']['TOOLS_T'].'\/(.*)\//', $self, $name);
$id = $name[1][0];
include '../../header.php';?>
<script src="js.js"></script>
<div class="container clearfix">
  <div class="panel panel-default">
    <div class="panel-heading"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></div>
    <div class="panel-body">
      <form  name="ascii">
        <div class="form-group">
          <label class="sr-only" for="exampleInputAmount">英文字母</label>
          <div class="input-group">
            <div class="input-group-addon">文本</div>
            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Young xj" value="Young xj" name="inputField">
          </div>
          <div>字体风格:
            <select name="textStyle" class="form-control"> 
              <option>Futuristik</option>
              <option selected="">Block</option>
            </select>
          </div> 
        </div>
        <div class="form-group">
          <input onclick="beginGenerator()" type="button" value="生成线条字" name="button" class="btn btn-success">
          <input id="copy" data-clipboard-target='#count' type="button" value="复制" class="btn btn-info">
        </div>
        <span id="windowMarker">
          <textarea name="outputField" wrap="off" style="height:200px; font-family:'宋体';" class="form-control" id="count">
          </textarea> 
        </span>
      </form>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">工具简介</div>
    <div class="panel-body">
      <p>线条字生成器，是一个生成由字符组成的“线条字”的在线转换工具。因其笔划形如缝纫线痕，故名。</p>
      <p>本转换器只支持字母和数字的转换，另外，可以使用换行符“\n”对输入的内容进行一次换行操作。</p>
      <p><a href="#482.html" target="_black">给源代码和控制台加上线条字</a></p>
      <p>如果遇到生成错乱，请设置文本框字体为宋体</p>
    </div>
  </div>
</div>
<?php include '../../footer.php';?>