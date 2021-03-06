<?php if (!defined('THINK_PATH')) exit();?><script>
$(document).ready(function(){
    $(".viewport").hideLoading();
    $('a.goods-list-content').click(function(){
        $(".viewport").showLoading();
    });
    $("#page").removeAttr("disabled");
    
    $(".main").on("click",".row",function(){
        var url = $(this).attr("data-href");
        $("body").showLoading();
        window.location.href=url;
    });   
});



        

 /**
     * 将以分为单位的数字进行货货格式化
     * @param num 数值(Number或者String)
     * @num 12343242324
     * @return 金额格式后的字符串:123,432,423.24
     * @type String
     * 1.先判断位数.如果为1则前面0.0
     * 如果为2,则前面补0.
     * 如果3位以上,以进行格式化
     */
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
    
    //加载更多
    function loadingMore($this)
    {
        $this.text("加载中……");
        var page = $this.attr("data-value");
        if(page == 0)
        {           
            $this.hide();
            return;
        }
        var url = "<?php echo ($postUrl); ?>?pageNum="+ page;
        $this.attr("disabled","disabled");
        
        $.get(url,function(data,status){ 
                var obj = eval('(' + data + ')');
                $(".main .col-xs-12").append(obj.list);
                $this.attr("data-value",obj.page);
                $this.removeAttr("disabled");
                $this.text("点击加载下一页");
                if(obj.page == 0)
                {
                    $this.hide();
                }
        });        
    }
        
//   var dropload = $('.col-xs-12').dropload({
//    domDown : {
//        domClass   : 'dropload-down',
//        domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
//        domUpdate  : '<div class="dropload-update">↓释放加载</div>',
//        domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中......</div>'
//    },
//    loadDownFn : function(me){
//        $this = $("#page");
//        var page = $this.attr("data-value");
//        if(page == 0)
//        {           
//            me.resetload();
//            return;
//        }
//        var url = "<?php echo ($postUrl); ?>?pageNum="+ page;
//        $.get(url,function(data,status){ 
//                var obj = eval('(' + data + ')');
//                $(".col-xs-12").append(obj.list);
//                $this.attr("data-value",obj.page);
//                me.resetload();
//        });
//        }
//});

//首页搜索按扭
    function search(){
        var value = $("#search-input").val();
        $(".main").showLoading();
        url = "<?php echo ($searchUrl); ?>?condition=" + value;
        $.get(url,function(data){
            var obj = eval("(" + data + ")"); 
            if(obj.state === 0){                
                 $(".main .col-xs-12").html(obj.content);             
            }else{
                $(".main .col-xs-12").html(obj.content);
//                $(".page").attr("data-value",obj.page);
            }
            $(".main").hideLoading();
            $(".page").attr("data-value",0);
        });
        
       
    }
    function queryLoad($this){
        var value = $("#search-input").val();
        var pageNum = $this.attr("data-page");
        $(".btn-box").html('');
        $(".content").append('<div class="loading"></div>');
        $.get("<?php echo ($loadUrl); ?>?pageNum=" + pageNum +"&queryAdd=" + value,function(data){            
            var obj = eval("(" + data + ")"); 
            $(".loading").remove();
            if(obj.state === 0){                
                     $(".list-group").append(obj.content);
                     $(".btn-box").html("没有了...");
                }else{
                    $(".list-group").append(obj.content);
                    $(".btn-box").html(obj.page);
                }
        });
    }
    
    
</script>