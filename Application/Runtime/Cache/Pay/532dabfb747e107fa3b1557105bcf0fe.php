<?php if (!defined('THINK_PATH')) exit();?><script>
//    function jumpurl(){
//        location = "<?php echo ($indexUrl); ?>";
//    }
    $(document).ready(function(){
        $(".tips").hide();
    });
    function otherPay(){        
    $(".tips").toggle();  
//    setTimeout('jumpurl()',3000);
    }
    //微信支付进行跳转
    function wxPay($this)
    {
        $("body").showLoading();
        url = $this.attr("data-href");
        window.location.href= url;   
    }
   function format_money(num) {
        var num = num.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
            return '0.00';
        if(num.length > 2)
        {
            //截取分
            var cents = num.substring(num.length-2,num.length);
            //取元
            num = Math.floor(num/100).toString();
            for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                num = num.substring(0,num.length-(4*i+3))+','+
                num.substring(num.length-(4*i+3));
            var res = (num + '.' + cents);
            return res;  
        }
        else
        {
            if(num.length == 2)
            {
                return '0.'+num;
            }
            else
            {
                return '0.0'+num;
            }
        } 
    }
</script>