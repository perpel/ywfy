$(function(){

    var lockedNav = true;

    $(".nav").click(function(){
        lockedNav = false;
    });

    /*
    $(".nav-bar").siblings().click(function(){

        lockedNav = true;

    });
    */

    $(".nav-bar").children(".dropdown").children(".dropdown-toggle").click(function(){

        lockedNav = false;
        dropdownShow( $(this).parent("li") );

    });

    var dropdownShow = function(obj){

        obj.children(".dropdown-menu").show();
        obj.children("a").css("color", "#000000");
        obj.siblings("li").children("a").css("color", "#616777");
        obj.siblings("li").children(".dropdown-menu").hide();
        //console.log("show");
        var dropdownWidth = obj.children(".dropdown-menu").width();
        //For ie
        obj.children(".dropdown-menu").children(".divider").css("width", dropdownWidth-24);

    };

    var dropdownHide = function(obj){
        //console.log("hide");
        obj.children(".dropdown-menu").hide();
        obj.children("a").css("color", "#616777");
        obj.siblings("li").children("a").css("color", "#616777");

    };

    $(".dropdown").mouseenter(function(){

        if(!lockedNav){
            dropdownShow($(this));
        }

    }).mouseleave(function(){

        if(!lockedNav){
            dropdownHide($(this));
        }
                
    });

    $(document).keydown(function(event){
       // alert(event.which);
       if( event.altKey ){

            var obj = $(".dropdown[data-keycode=" + event.which + "]");

            if(!lockedNav){
                dropdownShow(obj);
            }else{

                alert('菜单锁定，单击解锁！');
            }
            
       }

    });

        $(".dropdown-menu").find("a").mouseover(function(){

            $(this).parent("li").css('outline-style', 'solid');
            $(this).css('background-color', '#F0F0F0');

        }).mouseout(function(){

            $(this).parent("li").css('outline-style', 'none');
            $(this).css('background-color', '#FFFFFF');
        });

    

//side push

    var sidepushPush = function(obj){

        obj.children(".sidepush-menu").show();
        obj.children("a").css("color", "#000000");
        obj.siblings("li").children("a").css("color", "#616777");
        obj.siblings("li").children(".sidepush-menu").hide();
        //console.log("show");
        var sidepushLeftWidth = obj.parent("ul").width();
        obj.children(".sidepush-menu").css("left", sidepushLeftWidth);

    };

    var sidepushPull = function(obj){

        obj.children(".sidepush-menu").hide();
        obj.children("a").css("color", "#000000");
        obj.siblings("li").children("a").css("color", "#000000");

    };

    $(".sidepush").mouseenter(function(){

        sidepushPush($(this));
    }).mouseleave(function(){

        sidepushPull($(this));
    });

    //end nav-bar
});