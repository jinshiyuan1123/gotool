<?php
/*
Title:端口扫描
Subtitle:Port Blast
Plugin Name:portblast
Description:端口扫描,在线扫描工具,批量扫描,ip端口查询
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
				<input type="text" class="form-control" aria-label="..." onkeyup="value=value.replace(/[^\d\.]/g,'')" id="form-control">
				<div class="input-group-btn">
					<button class="btn btn-success" type="button" id="btn_state">启动</button>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-5"><input type="text" class="form-control" id="user_port" placeholder="自定义端口(多端口用.分隔)" onkeyup="value=value.replace(/[^\d\.]/g,'')"></div>
			</div>
			<div class="form-controlss text-left">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="table-responsive position">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td colspan="5" class="text-center success"><strong>常见端口参照表(以下端口无需再次添加)</strong></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>21(Ftp)</th>
					<th>22(Ssh)</th>
					<th>23(Telnet)</th>
					<th>25(Smtp)</th>
					<th>8888(BT)</th>
				</tr>
				<tr>
					<th>80(Http)</th>
					<th>110(Pop3)</th>
					<th>143(IMAP)</th>
					<th>443(Https)</th>
					<th>445(共享)</th>
				</tr>
				<tr>
					<th>1433(MSSQL)</th>
					<th>3306(MYSQL)</th>
					<th>3311(康乐)</th>
					<th>3312(康乐)</th>
					<th>3389(远程桌面)</th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>利用接口实现ip端口批量扫描</p>
			<p>自定义端口请用.分隔</p>
			<p>默认扫描端口：</p>
			<p>["21", "22", "23", "25", "79", "80", "110", "135", "137", "138", "139", "143", "443", "445", "888", "1433", "3306", "3311", "3312", "3389", "8888"]</p>
		</div>
	</div>

</div>
<script type="text/javascript" src="portblast.js"></script>
<?php include '../../footer.php';?>