<?php
/*
Title:域名权重查询
Subtitle:Rank
Plugin Name:rank
Description:站长之家,爱站网权重查询,搜狗PR,谷歌PR
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
  <div class="row row-xs">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 col-xs-offset-1 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
      <div class="page-header">
        <h3 class="text-center h3-xs"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></h3>
      </div>
      <h5 class="text-right"><small><?php echo $explains;?></small></h5>
			<div class="form-group" id="input-wrap">
				<label class="control-label control-msg" for="inputContent" copy="Youngxj|杨小杰，admin@youngxj.com"></label>
				<div class="input-group">
					<input type="text" class="form-control" aria-label="..." placeholder="域名" id="form-control">
					<div class="input-group-btn">
						<button class="btn btn-success" type="button" id="btn_state">启动</button>
					</div><!-- /btn-group -->
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
			<div class="form-controlss text-lefter">
				<div id="content"><?php echo $content;?></div>
				<div id="msg"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="rank.js"></script>
<?php include '../../footer.php';?>