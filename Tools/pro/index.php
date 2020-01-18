<?php
/*
Title:新浪图片主识别
Subtitle:Sina Pro
Plugin Name:pro
Description:新浪图片主识别
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

<link href="https://cdn.bootcss.com/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/amazeui/2.7.2/js/amazeui.min.js"></script>

<div class="container clearfix">
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></div>
		<div class="panel-body">
			<div class="am-u-lg-12 am-padding-vertical">
				<form class="am-form am-margin-bottom-lg" method="post" id="form-vld">
					<div class="am-u-md-12 am-u-sm-centered">
						<div class="am-form-group">
							<input type="url" id="imgsrc" class="am-form-field am-input-lg am-text-center am-radius" pattern="^https?:\/\/[a-z0-9]+\.sinaimg\.cn\/.+$" placeholder="微博图片地址" data-validation-message="请输入有效的微博图片地址" data-am-loading="{loadingText: ' '}" required>
							<div class="am-alert am-alert-danger"></div>
						</div>
						<button type="submit" id="submit" class="am-btn am-btn-primary am-btn-lg am-btn-block am-radius" data-am-loading="{spinner: 'cog', loadingText: '正在识别...', resetText: 'Get &#x221A;'}">Get &#x221A;</button>
					</div>
				</form>
				<form class="am-form am-u-md-12 am-u-sm-centered img-main"  style="display:none">
					<a type="button" id="backnow" class="am-btn am-btn-success am-btn-lg am-btn-block am-radius am-margin-bottom-lg">成功 Get &#x221A; 返回继续 <i class="am-icon-reply am-icon-fw"></i></a>
					<div class="am-input-group am-input-group-sm am-margin-bottom-sm" data-am-popover="{content: 'Po 主', trigger: 'hover'}">
						<span class="am-input-group-label"><i class="am-icon-link am-icon-fw"></i></span><input id="img-link-src" class="am-form-field" spellcheck="false"><span class="am-input-group-btn"><a id="img-link-btn" class="am-btn am-btn-default" target="_blank">查看 Po 主</a></span>
					</div>
					<p id="img-show" data-am-popover="{content: '预览图', trigger: 'hover'}"></p>
				</form>

			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>该工具可以根据图片地址逆推出发图人，只要你的图片来自微博图床，就算没有水印也能找出是谁发的图。</p>
			<p>微博图片地址指的是类似这种链接：</p>
			<blockquote>http://wx1.sinaimg.cn/mw690/0072Vf1pgy1foxkfv4t7bj31hc0u018w.jpg</blockquote>
			<p>可在图片上 <code>点击右键 -> 复制图片地址</code> 获取</p>
			<small>注：本功能并不能百分百找出发图人，部分图片找出的发图人可能不存在。</small>
		</div>
	</div>
</div>


<script>
	$(function() {
		var i = i || [];
		i.push(["_setAccount", "1264326742"]);
		var t = function(i) {
			i += "";
			for (var t = "0123456789abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ",
				a = t.length,
				s = i.length,
				n = 0,
				r = 0; s > n;) r += Math.pow(a, n++) * t.indexOf(i.charAt(s - n) || 0);
				return r
		},
		a = function(i) {
			var a = i.lastIndexOf("/"),
			s = i.substr(a + 1, 8);
			return s.startsWith("00") ? t(s) : parseInt(s, 16)
		};
		$("#form-vld").validator({
			onValid: function(i) {
				$(i.field).closest(".am-form-group").find(".am-alert").hide()
			},
			onInValid: function(i) {
				var t = $(i.field),
				a = t.closest(".am-form-group"),
				s = a.find(".am-alert"),
				n = t.data("validationMessage") || this.getValidationMessage(i);
				s.length || (s = $('<div class="am-alert am-alert-danger"></div>').hide().appendTo(a)),
				s.html(n).show()
			},
			submit: function(t) {
				t.preventDefault(),
				i.push(["_trackEvent", "imgsrc", "click", $("#imgsrc").val()]),
				this.isFormValid() && ($("#imgsrc").attr("disabled", !0), $("#submit").button("loading"), setTimeout(function() {
					var i = $("#imgsrc").val(),
					t = a(i);
					if (t) {
						var s = "https://weibo.com/u/" + t;
						$("#form-vld").slideUp(),
						$(".img-main").slideDown(),
						$("#img-link-src").val(s),
						$("#img-link-btn").prop("href", s),
						$("#img-show").html('<a href="' + i + '" target="_blank"><img src="' + i + '" class="am-img-thumbnail am-img-responsive am-center am-radius" alt="img"></a>')
					} else $("#imgsrc").closest(".am-form-group").find(".am-alert").html("\u627e\u4e0d\u5230 Po \u4e3b\uff0c\u8bf7\u68c0\u67e5\u56fe\u7247\u5730\u5740\u662f\u5426\u6b63\u786e").show();
					$("#imgsrc").attr("disabled", !1),
					$("#submit").button("reset")
				},
				500))
			}
		}),
		$(".img-main input").focus(function() {
			i.push(["_trackEvent", "imgsrc", "focus", $(this).val()]),
			$(this).select()
		}),
		$("#backnow").on("click",
			function() {
				i.push(["_trackEvent", "imgsrc", "back", $("#imgsrc").val()]),
				$("#form-vld").slideDown(),
				$(".img-main").slideUp(),
				$(".img-main input").val(""),
				$("#img-show").html("")
			})
	});
</script>

<?php include '../../footer.php';?>