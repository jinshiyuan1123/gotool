/**
* @act      二维码生成
* @version  1.1
* @author   youngxj
* @date     2018-07-01
* @url      http://www.youngxj.cn
*/

control('请输入内容：');

$('#btn_state').click(function () {
	act();
});

/*$('#form-control').blur(function () {
	act();
});*/

function act(){
	var val = $('input:radio:checked').val();
	if($('.form-control').val()==''){layer.msg('内容没有填写完整！');$('.form-controls').hide();return false;}
	console.log(val);
	if (val=='1') {
		$('.form-controls').show();
		$('.form-controls').html('<img src="https://api.yum6.cn/qrcode.php?url='+$('.form-control').val()+'">');
	}else if(val=='2'){
		$('.form-controls').show();
		qrcode();
	}else if(val=='3'){
		$('.form-controls').show();
		qrcode_decode();
	}else{
		layer.msg('意外的错误！');
	}
}
function qrcode(){
	if ($('#form-control').val()&&$('#qrcode_width').val()&&$('#qrcode_height').val()&&$('#qrcode_pro').val()&&$('#qrcode_bg').val()) {
		$('.form-controls').html('');
		var text = $('#form-control').val();
		var width = $('#qrcode_width').val();
		var height = $('#qrcode_height').val();
		var pro = $('#qrcode_pro').val();
		var bg = $('#qrcode_bg').val();
		var qrcode = new QRCode("form-controls", {
			text: $('#form-control').val(),
			width: $('#qrcode_width').val(),
			height: $('#qrcode_height').val(),
			colorDark : $('#qrcode_pro').val(),
			colorLight : $('#qrcode_bg').val(),
			src: 'https://www.wophost.cn/wp-content/uploads/2018/06/ico.png',
			correctLevel : QRCode.CorrectLevel.H
		});
	}else{
		layer.msg('内容没有填写完整！');
	}
}

function qrcode_decode(){
	if ($('.form-control').val() == "") {layer.alert('你是不是忘记填内容了？');return false;}
	$.getJSON("https://api.yum6.cn/deqrcode/?url="+$('.form-control').val(),function(result){
		layer.msg('稍等……'); 
		if (result.status=="1") {
			layer.msg('完成！');
			$('.form-controls').show();
			$('.form-controls').html('<br/><textarea id="res-txt" class="form-control" rows="5" placeholder="返回的内容">'+result['data']['RawData']+'</textarea>');
		}else{
			layer.msg('失败，请稍后重试');
		}
	});
}