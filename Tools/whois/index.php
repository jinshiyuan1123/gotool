<?php
/*
Title:Whois查询
Subtitle:Whois
Plugin Name:whois
Description:域名Whois查询,域名注册人信息查询
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
			<div class="form-group" id="input-wrap">
				<label class="control-label control-msg" for="inputContent" copy="Youngxj|杨小杰，admin@youngxj.com"></label>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="请填写域名" id="form-control">
					<div class="input-group-btn">
						<button class="btn btn-success" type="button" id="btn_state">启动</button>
					</div><!-- /btn-group -->
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
			<div class="form-controlss text-left">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>Whois 简单来说，就是一个用来查询域名是否已经被注册，以及注册域名的详细信息的数据库（如域名所有人、域名注册商、域名注册日期和过期日期等）。</p>
			<p>通过域名Whois服务器查询，可以查询域名归属者联系方式，以及注册和到期时间</p>
			<p>关于域名到期删除规则实施的解释：</p>
			<p>国际域名：
				<li>(1) 到期当天暂停解析，如果在72小时未续费，则修改域名DNS指向广告页面（停放）。域名到期后30-45天为域名保留期（不同注册商政策规定时间不同）</li>
				<li>(2) 过了保留期域名将进入赎回期（REDEMPTIONPERIOD，为期30天）</li>
				<li>(3) 过了赎回期域名将进入为期5天左右的删除期，删除期过后域名开放，任何人可注。</li>
			</p>
			<b>关于域名状态的解释：<a href="javascript:;" onclick="showDomainStatus()">点击查看</a></b>
			<div id="domainstatus" style="display: none;"><li>cn域名各个状态说明：</li><li>以client开头的状态表示由客户端(注册商)可以增加的状态</li><li>以server开头的状态表示服务器端(CNNIC)操作增加的状态</li><li>既不以client开头也不以server开头的状态由服务器端管理</li><li>域名的状态解释：</li><li>ok 正常状态</li><li>inactive 非激活状态(注册的时候没有填写域名服务器，不能进行解析)</li><li>clientDeletelirohibited 禁止删除</li><li>serverDeletelirohibited 禁止删除</li><li>clientUlidatelirohibited 禁止修改</li><li>serverUlidatelirohibited 禁止修改</li><li>liendingDelete 正在删除过程中</li><li>liendingTransfer 正在转移过程中</li><li>clientTransferlirohibited 禁止转移</li><li>serverTransferlirohibited 禁止转移</li><li>clientRenewlirohibited 禁止续费</li><li>serverRenewlirohibited 禁止续费</li><li>clientHold 停止解析</li><li>serverHold 停止解析</li><li>liendingVerification 注册信息正在确认过程中</li></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="whois.js"></script>
<?php include '../../footer.php';?>