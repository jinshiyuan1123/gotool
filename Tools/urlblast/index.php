<?php
/*
Title:在线子域名扫描
Subtitle:Url Blast
Plugin Name:urlblast
Description:在线子域名爆破扫描工具
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
				<input type="text" class="form-control" aria-label="..." id="form-control">
				<div class="input-group-btn">
					<button class="btn btn-success" type="button" id="btn_state">启动</button>
				</div>
			</div>

			<hr/>
			<div class="row">
				<div class="col-md-5">
					<input type="text" class="form-control" id="user_Dictionary" placeholder="自定义字典(多字典用,分隔)">
				</div>
			</div>
			<div class="form-controlss text-left">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>使用字典加接口实现子域名扫描</p>
			<p>自定义字典优先扫描</p>
			<p>可以自己添加三级甚至四级域名字典</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="urlblast.js"></script>
<?php include '../../footer.php';?>