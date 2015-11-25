$(function(){

    $(".side-dropdown.active").children(".side-dropdown-menu").show();
    $(".side-bar").find("li").click(function(event){
        event.stopPropagation(); 
    });
    $(".side-dropdown").click(function(event){

        if( !$(this).hasClass("active") ){
            $.cookie("fli", $(this).index());
            $(this).addClass("active");
            $(this).siblings("li").removeClass("active");
            dropdownMenuShow($(this));
        }else{

            $(this).removeClass("active");
            $(this).children(".side-dropdown-menu").slideUp();
        }

    });

    var dropdownMenuShow = function(oSelf){

        oSelf.children(".side-dropdown-menu").slideDown();
        oSelf.siblings("li").children(".side-dropdown-menu").slideUp();
    }

    var showSideBar = function(){
        var fLi = $.cookie("fli");
        //var sLi = 3;
        var active = $(".side-bar").children("ul").children("li").eq(fLi);
        active.siblings("li").removeClass("active");
        active.addClass("active"); 
        active.children(".side-dropdown-menu").show();
        active.siblings("li").children(".side-dropdown-menu").hide();
        //dropdownMenuShow( active );
    }

    showSideBar();

})