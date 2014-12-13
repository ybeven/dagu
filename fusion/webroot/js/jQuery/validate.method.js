////编写者：李开林
////日  期：2010-04-04
////功  能：增加验证功能

$(document).ready(function(){

    //设置默认属性
    $.validator.setDefaults({
        submitHandler:function(form){
            form.submit();
        }
    });


    // 验证字符长度
    jQuery.validator.addMethod("byteStringLength", function(value, element, param) {
        var length = value.length;
        for(var i = 0; i < value.length; i++){
            if(value.charCodeAt(i) > 127){
                length++;
            }
        }
        return this.optional(element) || ( length >= param[0] && length <= param[1] );
    }, "<br />请确保输入的值在100个字符以内（一个中文算两个字符）");

    jQuery.validator.addMethod("isNumber" , function(param){
        var Letters = "1234567890";
        var i;
        var c;
        for( i = 0; i < param.length; i ++ )
        {
            c = param.charAt( i );
            if (Letters.indexOf( c ) ==-1)
            {
                return true;
            }
        }
        return false;
    },"<br />请确保输入的值是整数");
});