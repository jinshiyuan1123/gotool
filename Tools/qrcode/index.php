<?php
/*
Title:二维码制作
Subtitle:Qrcode
Plugin Name:qrcode
Description:二维码制作
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
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="ewmtype1" value="1" checked=""> 生成默认二维码
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="ewmtype2" value="2"> 生成自定义二维码
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="ewmtype3" value="3"> 二维码内容解析
			</label>
			<hr/>
			<div class="row">
				<div class="col-md-3"><input type="text" class="form-control" id="qrcode_width" placeholder="宽度" value="100"></div>
				<div class="col-md-3"><input type="text" class="form-control" id="qrcode_height" placeholder="高度" value="100"></div>
				<div class="col-md-3"><input type="text" class="form-control" id="qrcode_pro" placeholder="前景" value="#000000"></div>
				<div class="col-md-3"><input type="text" class="form-control" id="qrcode_bg" placeholder="背景" value="#ffffff"></div>
			</div>
			<div class="form-controls text-center" id="form-controls" style="padding-top: 30px;">
				<label class="control-label" for="inputContent">返回的内容:</label>
				<textarea class="form-control" rows="10" onclick="oCopy(this)" id="form-control"></textarea>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>使用二维码接口及本地qrcode.js进行生成的二维码</p>
			<p>还支持二维码解析,只需要一个图片地址就可以解析</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="/js/qrcode.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
<?php include '../../footer.php';?>