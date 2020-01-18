/**
* @act      百度关键词排行
* @version  1.0
* @author   youngxj
* @date     2018-07-06
* @url      http://www.youngxj.cn
*/

var cache=getCookie('cache_url');
$('#form-control').val(cache);


$("#btn_state").click(function() {
	setCookie('cache_url',$('.form-control').val(),365);
	console.log($('#user_key').val());
	if ($('#user_key').val()!="") {
		var dist = new Array();
		var str = $("#user_key").val();
		var domain = $('.form-control').val();
		urls = domain.split(",");
		console.log(str);
		dist = str.split(",");
	}else{
		return layer.msg('请填写关键词');
	}
	query(0, dist,urls,0);
});
$(".form-control").keydown(function(e) {
	13 == e.keyCode && $("button").click();
})
function query(index, array,urls,urla) {
	//var domain = $('.form-control').val();
	if($('.form-control').val() == ""){
		return layer.msg('请填写域名');
	}
	if (urla<urls.length) {
		var domain = urls[urla];
		if (index < array.length) {
			$('.form-controlss').show();
			var value = array[index];
			layer.msg('玩命加载中');
			$.ajax({
				type: "get",
				url: "https://api.yum6.cn/baidu/rank.php?u="+domain+"&k="+value,
				async: true,
				dataType: "json",
				success: function(res) {
					$("#content").html("查找在 Baidu 收录结果 前50名关键词的排名情况");
					if (res.code == 200) {
						$("#msg").append("域名："+res.url+" 关键词："+res.keyword+" 排行"+res.rank+"名<br/>");
					}else{
						$("#msg").append("查询接口异常");
					}
					if (index < array.length) {
						query(index + 1, array,urls,urla);
						layer.msg('玩命加载中');
					}
				},
				error: function(res) {
					$("#msg").append("连接错误，请重试");
					layer.msg('连接错误，请重试');
				}
			});
		}else{
			query(0, array,urls,urla+1);
			layer.msg('玩命加载中');
		}
	}else{
		$("#msg").append("扫描完毕<br/>");
		layer.msg('扫描完毕');
	}
}

