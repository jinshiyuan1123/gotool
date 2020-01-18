/**
* @act      手机号查询
* @version  1.1
* @author   youngxj
* @date     2018-06-30
* @url      http://www.youngxj.cn
*/

control('请输入手机号');
$("#btn_state").click(function(){
	if ($('.form-control').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	$.ajax({
        type: "GET",
        url: "https://api.yum6.cn/mobile.php",
        data: "tel=" + $('.form-control').val(),
        dataType: "json",
        success: function(result) {
            if (result.state=='200') {
                if (result.local!='') {
                    $('.form-controlss').show();
                    $('#content').html('<table class="table table-bordered text-capitalize"><tbody><tr><td>'+result.local+'</td></tr><tr><td>'+result.duan+'</td></tr><tr><td>'+result.type+'</td></tr><tr><td>'+result.yys+'</td></tr><tr><td>'+result.bz+'</td></tr></tbody></table>');
                }else{
                    layer.alert('该手机号没有数据');
                }
            } else {
                layer.alert('获取失败，请重试！');
            }
        }
    });
});