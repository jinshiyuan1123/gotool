<?php
/*
Title:QQ群个性昵称
Subtitle:QQ card
Plugin Name:qqqun
Description:QQ个性昵称
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
				<input type="text" class="form-control" aria-label="..." id="withdraw_echo">
				<div class="input-group-btn">
					<button class="btn btn-success" type="button" id="btn_echo">制作Echo</button>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-4"><input type="text" class="form-control" id="withdraw_front" placeholder="前缀"></div>
				<div class="col-md-4"><input type="text" class="form-control" id="withdraw_behind" placeholder="后缀"></div>
				<div class="col-md-4"><button class="btn  col-md-12 btn-success" type="button" id="btn_with">制作撤回</button></div>
			</div>
			<div class="form-controls text-center">
				<label class="control-label" for="inputContent">返回的内容:</label>
				<textarea class="form-control" rows="5" onclick="oCopy(this)" id="form-control_content"></textarea>
			</div>

		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<div class="text-left Explain">
				<dl>
					<dt>Echo</dt>
					<dd>小杰|Echo</dd>
					<dd>小杰|Print</dd>
					<dd>小杰|Printf</dd>
					<dd>小杰|TracePrint</dd>
				</dl>
				<dl>
					<dt>撤回</dt>
					<dd>输入想要的名字，点击生成</dd>
					<dd>完整替换微信／QQ名字</dd>
					<dd>在对话中撤回消息，就会出现“XXX撤回了一条消息并XXXX”的效果 </dd>
					<dd>该效果会出现在别人的聊天界面里，本人的聊天界面里只显示撤回了一条消息，所以要问别人是否成功才知道</dd>
				</dl>
			</div>
		</div>
	</div>
</div>

</div>
<script type="text/javascript" src="with.js"></script>
<?php include '../../footer.php';?>