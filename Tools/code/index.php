<?php
/*
Title: 字符串加解密
Subtitle:EnCode Or DeCode
Plugin Name: code
Description: url加解密,base64加解密,md5加密,正则转义,图片base
Author: Youngxj
Author Email: blog@youngxj.cn
Author URL: #
Version: 1.2
*/

$CONF = require('../../function.config.php');
$self = $_SERVER['PHP_SELF'];
preg_match_all('/'.$CONF['config']['TOOLS_T'].'\/(.*)\//', $self, $name);

$id = $name[1][0];

include '../../header.php';
?>
<div class="container clearfix">

  <div class="panel panel-default">
    <div class="panel-heading"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></div>
    <div class="panel-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="请填写内容" id="form-control">
        <div class="input-group-btn">
          <button class="btn btn-success" type="button" id="btn_state">启动</button>
        </div>
      </div>
      <small><code>如果没有报错但是不返回内容就需要注意字符编码问题(目前工具编码为UTF-8)</code></small>
      <br/>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="urlencode" value="urlencode" checked=""> urlencode
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="urldecode" value="urldecode"> urldecode
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="base64_encode" value="base64_encode"> base64_encode
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="base64_decode" value="base64_decode"> base64_decode
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="md5" value="md5"> md5
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="addslashes" value="addslashes"> addslashes
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="stripslashes" value="stripslashes"> stripslashes
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="base64_image_mult" value="base64_image_mult"> base64_image_mult
      </label>
      <label class="radio-inline">
        <input type="radio" name="ewmtype" id="base64_image_url" value="base64_image_url"> base64_image_url
      </label>

      <hr/>
      <div class="form-controls">
        <label class="control-label" for="inputContent">返回的内容:</label>
        <textarea class="form-control" rows="10" onclick="oCopy(this)" id="content" placeholder="如果没有报错但是不返回内容就需要注意字符编码问题"></textarea>
      </div>
      <form id="form1">
        <div class="upload-drag" id="upload-drag" onclick="file.click()" title="点击上传图片">
          <img src="https://ww2.sinaimg.cn/large/843dc74bgy1fpkedpgq3tj201c01c0of.jpg">
          <p id="stat">点击上传</p>
          <input type="file" id="file" name="file" onchange="sc();" style="display:none" accept="image/*">  
        </div>
      </form>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">工具简介</div>
    <div class="panel-body">
      <p>集多种函数于一身实现的编码转换功能</p>
      <p>目前支持：</p>
      <li>url地址编码与解码</li>
      <li>base64加密与解密<small><code>(目前仅支持utf-8编码)</code></small></li>
      <li>md5加密</li>
      <li>addslashes->在每个双引号（"）前添加反斜杠</li>
      <li>stripslashes->与上相反，删除反斜杠</li>
      <li>base64_image_mult->图片上传进行base64图片加密</li>
      <li>base64_image_url->使用网络图片进行base64图片加密</li>
    </div>
  </div>
</div>

<script type="text/javascript" src="code.js"></script>
<?php include '../../footer.php';?>