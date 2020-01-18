<?php
/*
Title:短网址生成
Subtitle:Dwz Url
Plugin Name:dwzurl
Description:短网址,dwz,短网址生成,免费防红,防红接口,ae博客
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
				<input type="radio" name="ewmtype" id="dwzurl" value="dwzurl" checked=""> 短网址跳转
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="dwzqrcode" value="dwzqrcode"> 短网址跳转二维码
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="sinadwz" value="sinadwz"> 新浪短网址
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="sinalong" value="sinalong"> 新浪短网址还原
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="eps_gs" value="eps_gs"> eps_gs短网址
			</label>
			<label class="radio-inline">
				<input type="radio" name="ewmtype" id="eps_gs_un" value="eps_gs_un"> eps_gs短网址还原
			</label>
			<div class="form-controls text-center">
				<label class="control-label" for="inputContent">返回的内容:</label><br/>
				
			</div>
		</div>
	</div>

</div>
<script type="text/javascript" src="dwzurl.js"></script>
<?php include '../../footer.php';?>