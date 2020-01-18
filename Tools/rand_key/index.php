<?php
/*
Title:随机密码生成
Subtitle:Rand Key
Plugin Name:rand_key
Description:随机密码生成,卡密生成
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
    <div class="panel-heading">随机密码生成器</div>
    <div class="panel-body tool-body">
      <div class="form-group">
        <label class="checkbox-inline">
          <input type="checkbox" id="include_number" checked>数字
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="include_lowercaseletters" checked>小写字母
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="include_uppercaseletters" checked>大写字母
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="include_punctuation">标点符号
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="password_unique">字符不重复
        </label>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">密码长度</span>
          <input type="number" id="password_length" class="form-control" min="0" value="8">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">密码数量</span>
          <input type="number" id="password_quantity" class="form-control" min="0" value="5">
        </div>
      </div>
      <div class="form-group text-center">
        <button id="generate" class="btn btn-success">生成密码</button>
      </div>
      <textarea id="output" class="form-control" cols="40" rows="7" readonly></textarea>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">工具简介</div>
    <div class="panel-body">
      <p>随机密码生成器 - 随机字符串生成器 - Random Password Generator。</p>
      <p>可用于生成随机卡密等等</p>
    </div>
  </div>
</div>
<script src="js/password.js"></script>
<?php include '../../footer.php';?>