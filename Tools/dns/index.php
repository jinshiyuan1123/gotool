<?php
/*
Title:Dns解析查询
Subtitle:Dns Query
Plugin Name:dns
Description:dns解析查询,dns记录查询,ns解析查询
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
			<hr/>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="ns" value="ns" checked=""> ns
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="a" value="a"> a
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="cname" value="cname"> cname
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="aaaa" value="aaaa"> aaaa
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="mx" value="mx"> mx
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="txt" value="txt"> txt
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="srv" value="srv"> srv
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="ptr" value="ptr"> ptr
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="soa" value="soa"> soa
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="hinfo" value="hinfo"> hinfo
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="naptr" value="naptr"> naptr
			</label>
			<div class="form-controls text-left" style="position: relative;">
				<pre id="content"></pre>
				<span id="clear"></span>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>使用接口进行域名解析查询</p>
			<p>目前支持的几乎全部解析方式查询</p>
			<p>使用限制：单IP 3s/次</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="dns.js"></script>
<?php include '../../footer.php';?>