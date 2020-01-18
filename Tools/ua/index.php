<?php
/*
Title:UA分析
Subtitle:UA Analysis
Plugin Name:ua
Description:在线获取并分析useragent
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

function getBrowser($agent = null){
	if ($agent==null) {
		$u_agent = $agent ?: isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	}else{
		$u_agent = $agent;
	}

	if (!$u_agent) return ['agent' => '', 'browser' => '', 'version' => '', 'os' => '', 'kernel' => ''];

    //操作系统
	if (preg_match('/win/i', $u_agent) && strpos($u_agent, '95')){
		$os = 'Windows 95';
	}
	else if (preg_match('/win 9x/i', $u_agent) && strpos($u_agent, '4.90')){
		$os = 'Windows ME';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/98/i', $u_agent)){
		$os = 'Windows 98';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/nt 6.0/i', $u_agent)){
		$os = 'Windows Vista';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/nt 6.1/i', $u_agent)){
		$os = 'Windows 7';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/nt 6.2/i', $u_agent)){
		$os = 'Windows 8';
	}
	else if(preg_match('/win/i', $u_agent) && preg_match('/nt 10.0/i', $u_agent)){
		$os = 'Windows 10';
	}else if (preg_match('/win/i', $u_agent) && preg_match('/nt 5.1/i', $u_agent)){
		$os = 'Windows XP';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/nt 5/i', $u_agent)){
		$os = 'Windows 2000';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/nt/i', $u_agent)){
		$os = 'Windows NT';
	}
	else if (preg_match('/win/i', $u_agent) && preg_match('/32/i', $u_agent)){
		$os = 'Windows 32';
	}
	else if (preg_match('/unix/i', $u_agent)){
		$os = 'Unix';
	}
	else if (preg_match('/sun/i', $u_agent) && preg_match('/os/i', $u_agent)){
		$os = 'SunOS';
	}
	else if (preg_match('/ibm/i', $u_agent) && preg_match('/os/i', $u_agent)){
		$os = 'IBM OS/2';
	}
	else if (preg_match('/Mac/i', $u_agent) && preg_match('/PC/i', $u_agent)){
		$os = 'Macintosh';
	}
	else if (preg_match('/PowerPC/i', $u_agent)){
		$os = 'PowerPC';
	}
	else if (preg_match('/AIX/i', $u_agent)){
		$os = 'AIX';
	}
	else if (preg_match('/HPUX/i', $u_agent)){
		$os = 'HPUX';
	}
	else if (preg_match('/NetBSD/i', $u_agent)){
		$os = 'NetBSD';
	}
	else if (preg_match('/BSD/i', $u_agent)){
		$os = 'BSD';
	}
	else if (preg_match('/OSF1/i', $u_agent)){
		$os = 'OSF1';
	}
	else if (preg_match('/IRIX/i', $u_agent)){
		$os = 'IRIX';
	}
	else if (preg_match('/FreeBSD/i', $u_agent)){
		$os = 'FreeBSD';
	}
	else if (preg_match('/teleport/i', $u_agent)){
		$os = 'teleport';
	}
	else if (preg_match('/flashget/i', $u_agent)){
		$os = 'flashget';
	}
	else if (preg_match('/webzip/i', $u_agent)){
		$os = 'webzip';
	}
	else if (preg_match('/offline/i', $u_agent)){
		$os = 'offline';
	}
	else if (preg_match('/iphone/i', $u_agent)){
		preg_match("/(?<=CPU iPhone OS )[\d\_]{1,}/", $u_agent, $version);
		$os = 'iphone '.str_replace('_', '.', $version[0]);
	}
	else if (preg_match('/android/i', $u_agent)){
		preg_match("/(?<=Android )[\d\.]{1,}/", $u_agent, $version);
		$os = 'Android '.$version[0];
	}
	else if (preg_match('/ipad/i', $u_agent)){
		preg_match("/(?<=CPU OS )[\d\_]{1,}/", $u_agent, $version);
		$os = 'ipad '.str_replace('_', '.', $version[0]);
	}
	else if (preg_match('/linux/i', $u_agent)){
		$os = 'Linux';
	}
	
	else{
		$os = '未知操作系统';
	}


    //内核
	if (preg_match('/Trident/i', $u_agent)) {
		$kernel = 'Trident';
	} elseif (preg_match('/Webkit/i', $u_agent)) {
		$kernel = 'Webkit';
	} elseif (preg_match('/Gecko/i', $u_agent)) {
		$kernel = 'Gecko';
	} elseif (preg_match('/Presto/i', $u_agent)) {
		$kernel = 'Presto';
	} else {
		$kernel = 'Unknown';
	}

    //浏览器
	switch (true) {
		case (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) :
		$browser = 'Internet Explorer';
		$fix = 'MSIE';
		break;
        case (preg_match('/Trident/i', $u_agent)) : // IE11专用
        $browser = 'Internet Explorer';
        $fix = 'rv';
        break;
        case (preg_match('/Edge/i', $u_agent)) ://必须在Chrome之前判断
        $browser = $fix = 'Edge';
        break;
        case (preg_match('/MicroMessenger/i', $u_agent)) ://必须在QQBrowser之前判断
        $browser = $fix = 'MicroMessenger';
        break;
        case (preg_match('/QQ/i', $u_agent)) ://必须在Chrome之前判断
        $browser = $fix = 'QQBrowser';
        break;
        case (preg_match('/UC/i', $u_agent)) ://必须在Apple Safari之前判断
        $browser = $fix = 'UCBrowser';
        break;
        case (preg_match('/Firefox/i', $u_agent)) :
        $browser = $fix = 'Firefox';
        break;
        case (preg_match('/Chrome/i', $u_agent)) :
        $browser = $fix = 'Chrome';
        break;
        case (preg_match('/Safari/i', $u_agent)) :
        $browser = $fix = 'Safari';
        break;
        case (preg_match('/Opera/i', $u_agent)) :
        $browser = $fix = 'Opera';
        break;
        case (preg_match('/Netscape/i', $u_agent)) :
        $browser = $fix = 'Netscape';
        break;
        default:
        $browser = $fix = 'Unknown';
    }

    $pattern = "/(?<bro>Version|{$fix}|other|QQ)[\/|\:|\s](?<ver>[0-9a-zA-Z\.]+)/i";
    preg_match_all($pattern, $u_agent, $matches);
    $i = count($matches['bro']) !== 1 ? (strripos($u_agent, "Version") < strripos($u_agent, $fix) ? 0 : 1) : 0;

    return [
    	'agent' => $u_agent,
    	'browser' => $browser,
    	'version' => $matches['ver'][$i] ?: '?',
    	'os' => $os,
    	'kernel' =>$kernel
    ];
}
/**
 * 获取浏览器语言
 */
function GetLang(){
	if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
		$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$lang = substr($lang,0,5);
		if(preg_match("/zh-cn/i",$lang)){
			$lang = "简体中文";
		}elseif(preg_match("/zh/i",$lang)){
			$lang = "繁体中文";
		}else{
			$lang = "English";
		}
		return $lang; 
	}else{
		return "获取浏览器语言失败！";
	}
}


if (getParam('useragent')) {
	$useragent = getParam('useragent');
}else{
	$useragent = null;
}
$arr = getBrowser($useragent);
?>
<div class="container clearfix">
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></div>
		<div class="panel-body">
			<form action="#" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $arr['agent'];?>" name="useragent">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit" id="btn_state">分析</button>
					</div><!-- /btn-group -->
				</div><!-- /input-group -->
			</form>
		</div>
	</div>
	<div class="table-responsive position">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td colspan="2" class="text-center success"><strong>UA基本信息如下(<a href="http://www.aeink.com/383.html" target="_blank">更多常见ua请查看</a>)</strong></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>浏览器</th>
					<th><?php echo $arr['browser'];?></th>
				</tr>
				<tr>
					<th>浏览器版本</th>
					<th><?php echo $arr['version'];?></th>
				</tr>
				<tr>
					<th>操作系统</th>
					<th><?php echo $arr['os'];?></th>
				</tr>
				<tr>
					<th>操作内核</th>
					<th><?php echo $arr['kernel'];?></th>
				</tr>
				<tr>
					<th>浏览器语言</th>
					<th><?php echo GetLang();?></th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="form-controlss text-left">
		<div id="content"></div>
		<div id="msg"></div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>UserAgent</p>
			<li>用户代理 User Agent，是指浏览器,它的信息包括硬件平台、系统软件、应用软件和用户个人偏好。</li>
			<li>早的时候有一个浏览器叫NCSA Mosaic，把自己标称为NCSA_Mosaic/2.0 (Windows 3.1)，它支持文字显示的同时还支持图片，于是Web开始好玩起来。</li>
			<li>通过浏览器navigator.userAgent，可以获得用户的UserAgent。</li>
			<li>UserAgent简称UA，可以用作一个用户的真实访问，一般的Web统计流量也会针对UA信息去统计浏览器占比，移动占比等等。</li>
		</div>
	</div>
</div>

<script type="text/javascript">
	control('请输入ua信息');
	$("#btn_state").click(function() {
		if ($('.form-control').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	});
</script>
<?php include '../../footer.php';?>