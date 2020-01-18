<?php
/*
Title:QQ在线状态
Subtitle:QQ State
Plugin Name:qqstate
Description:QQ电脑在线查询
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
				<input type="number" class="form-control" aria-label="..." placeholder="QQ">
				<div class="input-group-btn">
					<button class="btn btn-success" type="button" id="btn_state">启动</button>
				</div>
			</div>
			<div class="form-controlss text-lefter">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>利用接口实现QQ查询是否电脑在线</p>
			<p>仅支持电脑在线检测,手机在线检测目前暂不支持</p>
			<p>可以通过QQ交谈进行QQ会话</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="qqstate.js"></script>
<?php include '../../footer.php';?>