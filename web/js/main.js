$(function(){

    $(window).on("resize load", function(){
        var win = $(window).width();
        var winHeight = $(window).height();
        var sectionWidth = win - $(".side").width();
       $(".section").width(sectionWidth-1);
       $(".section").height(winHeight - 120);
    });

    /**
    * section-bar
    */
    $("body").on("mouseenter", ".fnt", function(){
        $(this).addClass("active");
        $(this).css("cursor", "hand");
    });

    $("body").on("mouseleave", ".fnt", function(){
        $(this).removeClass("active");
    });

    $("body").on("mouseenter", ".tablebook tr", function(){
        $(this).css("background-color", "lightyellow");
    });

    $("body").on("mouseleave", ".tablebook tr", function(){
        $(this).css("background-color", "white");
    });

    $("body").on("click", ".tablebook tr:gt(0)", function(){
        $(this).siblings("tr").removeClass("selected");
        $(this).addClass("selected");
    });
    //end section-bar

    //pop window
    window.edit_pop = undefined;

    var pop_index = 9;

    $("body").on("click", ".pop", function(){
        $(this).css("z-index", pop_index);
        pop_index = pop_index + 1;
    });


    $("#__pwpop").click(function(){

            var data = '<input type="text" id="__pw"><input type="button" id="__subpw" value="修改">';
            var pop = $(this).pop({_size:"customer", _width:"250px", _height:"55px", _top:"200px", _left:"400px"});
            $(".pop-content", pop).html(data);
            pop.on("click", "#__subpw", function(){
                    var pw = pop.find("#__pw").val();
                    $.get("./index.php?r=sys/default/edit-pw",{"pw":pw}, function(data){
                            if(data == "success"){            
                                alert("成功");
                                pop.remove();
                            }
                            if(data == "defail"){
                                alert("修改密码失败");
                            }
                    });
            });


    });

});