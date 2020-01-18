<?php
/*
Title:百度关键词排行
Subtitle:KeyWord Rank
Plugin Name:KeyWords
Description:百度关键词查询,百度关键词排行
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
				<div class="col-md-5"><input type="text" class="form-control" id="user_key" placeholder="自定义关键词(多关键词用,分隔)"></div>
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
			<p>利用接口实现百度关键词排行查询</p>
			<p>批量域名用英文状态下的逗号,分隔</p>
			<p>批量关键词用英文状态下的逗号,分隔</p>
			<p>由于地区排行不同,本查询结果不作唯一结果</p>
		</div>
	</div>

</div>
<script type="text/javascript" src="KeyWords.js"></script>
<?php include '../../footer.php';?>