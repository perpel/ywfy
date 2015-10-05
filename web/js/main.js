$(function(){

            /*--------------拖曳效果----------------
            *原理：标记拖曳状态dragging ,坐标位置iX, iY
            *         mousedown:fn(){dragging = true, 记录起始坐标位置，设置鼠标捕获}
            *         mouseover:fn(){判断如果dragging = true, 则当前坐标位置 - 记录起始坐标位置，绝对定位的元素获得差值}
            *         mouseup:fn(){dragging = false, 释放鼠标捕获，防止冒泡}
            */
            var dragging = false;
            var iX, iY;
            var minTop = 0;
            var minLeft = 0;
            $(".drag").mousedown(function(e) {
                dragging = true;
                var parent = this.parentElement;
                iX = e.clientX - parent.offsetLeft;
                iY = e.clientY - parent.offsetTop;
                this.setCapture && this.setCapture();
                return false;
            });
            document.onmousemove = function(e) {
                if (dragging) {
                var e = e || window.event;
                var oX = e.clientX - iX;
                var oY = e.clientY - iY;
                if(oY<minTop){

                    oY = 0;

                }
                if(oX<minLeft){

                    oX = 0;
                }

                $(".drag").parent("div").css({"left":oX + "px", "top":oY + "px"});
                return false;
                }
            };
            $(document).mouseup(function(e) {
                dragging = false;
                $(".drag")[0].releaseCapture();
                e.cancelBubble = true;
            });
 
 

            $("#close-pop").click(function(){
                alert(123);
                $("#pop-input .content").html("");
                $("#pop-input").css("display", "none");
            });



//date
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

        var dateObj = new Date(parseInt($(".clock").text()) * 1000);
        $(".clock").text("今天是：" + dateObj.pattern("yyyy年MM月dd日 EEE"));



/***********************************/

$(".side-dropdown").children("a").click(function(){

    $(this).toggleClass("a-down");
    $(this).siblings(".side-dropdown-menu").slideToggle();
});

$(".side-dropdown-menu").find("a").mouseenter(function(){

    $(this).parent("li").siblings("li").find("a").css({

        'background-color': '#375A9F',
       
        'color': 'white',
        

    });
    $(this).css({
        'background-color': '#FFFFFF',
        
        'color': 'darkblue',
        
    });
});



    
});