//extension Date
Date.prototype.pattern = function(fmt) {         
            var o = {         
            "M+" : this.getMonth()+1, //月份         
            "d+" : this.getDate(), //日         
            "h+" : this.getHours()%12 == 0 ? 12 : this.getHours()%12, //小时         
            "H+" : this.getHours(), //小时         
            "m+" : this.getMinutes(), //分         
            "s+" : this.getSeconds(), //秒         
            "q+" : Math.floor((this.getMonth()+3)/3), //季度         
            "S" : this.getMilliseconds() //毫秒         
            };         
            var week = {         
            "0" : "天",         
            "1" : "一",         
            "2" : "二",         
            "3" : "三",         
            "4" : "四",         
            "5" : "五",         
            "6" : "六"        
            };         
            if(/(y+)/.test(fmt)){         
                fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));         
            }         
            if(/(E+)/.test(fmt)){         
                fmt=fmt.replace(RegExp.$1, ((RegExp.$1.length>1) ? (RegExp.$1.length>2 ? "星期" : "周") : "")+week[this.getDay()+""]);         
            }         
            for(var k in o){         
                if(new RegExp("("+ k +")").test(fmt)){         
                    fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));         
                }         
            }         
            return fmt;         
} 

$(function(){

        var dateObj = new Date(parseInt($(".clock").text()) * 1000);
        $(".clock").text("今天是：" + dateObj.pattern("yyyy年MM月dd日 EEE"));

        $(".close.drag").click(function(){
            $(this).parent().hide();
        });

        var dragMove = function(oDrag, distX, distY){
            $(document).bind("mousemove", function(event){
                   var posX = event.pageX - distX;
                   var posY = event.pageY - distY;
                   if( posX < 0 ){
                        posX = 0;
                   }
                   if( posY < 0 ){
                        posY = 0;
                   }
                    oDrag.css({
                        'left':  posX + 'px',
                        'top':  posY + 'px'
                    });
                });
            };


            $(".drag").mousedown(function(event){

                var oDrag = $(this).parent();
                var pos = oDrag.offset();
                var distX = event.pageX - pos.left;
                var distY = event.pageY - pos.top;
                dragMove(oDrag, distX, distY);

            }).mouseup(function(){

                $(document).unbind("mousemove");
            });

});    