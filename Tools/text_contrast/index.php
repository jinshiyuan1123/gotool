<?php
/*
Title:在线文本对比
Subtitle:Text Contrast
Plugin Name:text_contrast
Description:在线文本对比,代码对比
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

	<script type="text/javascript" src="codemirror.js"></script>
	<link type="text/css" rel="stylesheet" href="codemirror.css" />
	<script type="text/javascript" src="mergely.js"></script>
	<link type="text/css" rel="stylesheet" href="mergely.css" />
<div style="padding-left:10px;">
	<div id="mergely-resizer">
		<div id="compare">
		</div>
	</div>
  <div>
<script type="text/javascript">
	function getWinHeight() {
		var winHeight = 0;
		if (window.innerHeight)
			winHeight = window.innerHeight;
		else if ((document.body) && (document.body.clientHeight))
			winHeight = document.body.clientHeight;
		return winHeight;
	}
	function getWinWidth() {
		var winWidth = 0;
		if (window.innerWidth)
			winWidth = window.innerWidth;
		else if ((document.body) && (document.body.clientWidth))
			winWidth = document.body.clientWidth;
		return winWidth;
	}
	$(document).ready(function () {
		$('#compare').mergely({
			width: 'auto',
			height: '400',
			cmsettings: {
				readOnly: false, 
				lineWrapping: true,
			},
			lhs: function(setValue) {
				setValue('/*	welcome here, tools.yum6.cn	*/');
			},
			rhs: function(setValue) {
				setValue('/*	welcome here, tools.yum6.cn YoungxjTools	*/');
			}
		});
		$(window).resize(function() {
			$('#compare').mergely('options', {height:getWinHeight() - 30, width:getWinWidth() - 30});
			$('#compare').mergely('update')
		});
		$(window).resize();
	});
	
</script>


<?php include '../../footer.php';?>