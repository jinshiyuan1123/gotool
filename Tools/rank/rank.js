/**
* @act      rank
* @version  1.1
* @author   youngxj
* @date     2018-06-30
* @url      http://www.youngxj.cn
*/

var cache=getCookie('cache_url');
$('#form-control').val(cache);
control('请输入域名地址：');
$("#btn_state").click(function(){
	layer.msg('稍等……');
	if ($('.form-control').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	$.getJSON("https://api.yum6.cn/zzqzs.php?url="+$('.form-control').val()+"&type=json",function(result){
		if (result) {
			$.getJSON("https://api.yum6.cn/aizhan.php?url="+$('.form-control').val()+"&type=json",function(results){
				if (results) {	
					var baidupc = results['data']['baidupc'];
					var baidum = results['data']['baidum'];
					var sougou = results['data']['sougou'];
					var google = results['data']['google'];
				}else{
					var baidupc = '';
					var baidum = '';
					var sougou = '';
					var google = '';
				}
				setCookie('cache_url',$('.form-control').val(),365);
				layer.msg('ok');
				$('.form-controlss').show();
				$('#content').html('<table class="table table-bordered"><tbody><tr><th scope="row">域名</th><td>'+$('.form-control').val()+'</td></tr><tr><th scope="row">百度PC</th><td><img src="http://css.tools.chinaz.com/tools/images/public/baiduapp/'+result.dupc+'.gif"/><img src="https://statics.aizhan.com/images/br/'+baidupc+'.png"/></td></tr><tr><th scope="row">百度Mobile</th><td><img src="http://css.tools.chinaz.com/tools/images/public/baiduapp/'+result.dumobile+'.gif"/><img src="https://statics.aizhan.com/images/mbr/'+baidum+'.png"></td></tr><tr><th scope="row">360PC</th><td><img src="http://css.tools.chinaz.com/tools/images/public/360rank/'+result.pc360+'.gif"/></td></tr><tr><th scope="row">360mobile</th><td><img src="http://css.tools.chinaz.com/tools/images/public/360rank/'+result.mobile360+'.gif"/></td></tr><tr><th scope="row">神马搜索</th><td><img src="http://css.tools.chinaz.com/tools/images/public/sm-waprk/'+result.sm+'.gif"/></td></tr><tr><th scope="row">搜狗PR</th><td><img src="https://statics.aizhan.com/images/sr/'+sougou+'.png"/></td></tr><tr><th scope="row">谷歌PR</th><td><img src="https://statics.aizhan.com/images/pr/'+google+'.png"/></td></tr></tbody></table>');
			});	

		}
	});
});

