<?php
/*
Title:手机号归属查询
Subtitle:Phone
Plugin Name:phone
Description:手机号码归属地查询
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
				<input type="text" class="form-control" placeholder="请填写手机号" onKeyUp="value=value.replace(/\D/g,'')" onafterpaste="value=value.replace(/\D/g,'')" >
				<div class="input-group-btn">
					<button class="btn btn-success" type="button" id="btn_state">启动</button>
				</div><!-- /btn-group -->
			</div><!-- /input-group -->
			<div class="form-controlss text-left">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>使用稳定第三方数据进行查询</p>
			
		</div>
	</div>
</div>
<script type="text/javascript" src="phone.js"></script>
<?php include '../../footer.php';?>