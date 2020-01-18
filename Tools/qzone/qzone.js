/**
* @act      qq空间艾特蓝链
* @version  1.1
* @author   youngxj
* @date     2018-07-02
* @url      http://www.youngxj.cn
*/

control('请输入QQ号：');
$("#btn_state").click(function(){
	if ($('.form-control').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	if ($('#text').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	$.getJSON("qqzone_api.php?qq="+$('.form-control').val(),function(result){ 
		if (result.code=="1") {
			var host = window.document.location.href;
			$('#content').html("<textarea id='url-res-txt' class='form-control' rows='5' placeholder='复制到QQ空间发布' data-clipboard-target='#url-res-txt'>{url:http%3A//,text: }{url:http%3A//"+host+result.url+",text:@"+$('#text').val()+"}</textarea>");
		}else{
			layer.msg(result.msg);
		}
	});
});

var clipboard = new ClipboardJS('#url-res-txt');
clipboard.on('success',function(e){
 e.clearSelection();
 layer.msg('复制成功！');
 });
clipboard.on('error',function(e){
 e.clearSelection();
 layer.msg('复制失败！');
 });