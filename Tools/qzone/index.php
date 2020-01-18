<?php
/*
Title:Qzone蓝链艾特
Subtitle:Qzone
Plugin Name:qzone
Description:Qzone蓝链艾特
Author:Youngxj
Author Email:blog@youngxj.cn
Author URL:#
Version:1.1
*/
$CONF = require('../../function.config.php');
$self = $_SERVER['PHP_SELF'];
preg_match_all('/'.$CONF['config']['TOOLS_T'].'\/(.*)\//', $self, $name);
$id = $name[1][0];
include '../../header.php';
?>
<div class="container clearfix">
	<div class="row row-xs">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
			<div class="page-header">
				<h3 class="text-center h3-xs"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></h3>
			</div>
			<h5 class="text-right"><small><?php echo $explains;?></small></h5>
			<div class="form-group" id="input-wrap">
				<label class="control-label control-msg" for="inputContent" copy="Youngxj|杨小杰，admin@youngxj.com"></label>
				<div class="input-group">
					<input type="number" class="form-control" aria-label="...">
					<div class="input-group-btn">
						<button class="btn btn-success" type="button" id="btn_state">启动</button>
					</div><!-- /btn-group -->
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
			<input type="text" class="form-control" id="text" placeholder="@文字" style="margin-bottom:10px;">
			<div class="form-controlss text-center">
				<div id="content"></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="qzone.js"></script>
<?php include '../../footer.php';?>