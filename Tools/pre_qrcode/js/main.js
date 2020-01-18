$(document).ready(function() {
    var value = 'https://tools.yum6.cn/';
    var filter = 'color';
    var imagePath = 'img/favicon.ico';

    var self = this;

    function makeQR() {
        var qr = qrcode.QRCode(10, 'H');
        qr.addData(value);
        qr.make();
        document.getElementById('combine').innerHTML = qr.createImgTag(3);
    }

    function makeQArt() {
        new QArt({
            value: utf16to8(value),
            imagePath: imagePath,
            filter: filter
        }).make(document.getElementById('combine'));
    }

    function getBase64(file, callback) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
            callback(reader.result);
        };
    }

    $('#value').keyup(function() {
        value = $(this).val();
        makeQR();
        makeQArt();
    });

    $('#file').change(function() {
        getBase64(this.files[0], function(base64Img) {
            var regex = /data:(.*);base64,(.*)/gm;
            var parts = regex.exec(base64Img);
            imagePath = parts[0];
            $('#image img').attr('src', imagePath);
            makeQArt();
        });
    });

    $('input[type=radio]').click(function() {
        filter = $(this).val();
        makeQArt();
    });

    makeQR();
    makeQArt();
});

function utf16to8(str) {  
    var out, i, len, c;  
    out = "";  
    len = str.length;  
    for(i = 0; i < len; i++) {  
    c = str.charCodeAt(i);  
    if ((c >= 0x0001) && (c <= 0x007F)) {  
        out += str.charAt(i);  
    } else if (c > 0x07FF) {  
        out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));  
        out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));  
        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));  
    } else {  
        out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));  
        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));  
    }  
    }  
    return out;  
}