$(function(){

    var posIndex = 0;

    var setSelected = function(){
        var trs = $(".drag-table").children("tbody").find("tr");
        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).css("background-color", "lightgreen");
                }   
            });
        });
    };

    var removeSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");
        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).css("background-color", "white");
                }   
            });
        });

    };

    var cleanColSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");

        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).empty();
                }   
            });
        });

    };

    var deleteColSeleted = function(){

        var trs = $(".drag-table").children("tbody").find("tr");

        $.each(trs, function(i, v){         
            $(this).children().each(function(k, val){
                if(k == posIndex && posIndex != 0){
                    $(this).remove();
                }   
            });
        });

    };

    var deleteRowSeleted = function(){

        $(":checkbox[name='rowSelect']").each(function(){
            if( $(this).is(":checked") ){
                $(this).parent("td").parent("tr").remove();
            }
        });
    };

    var rotateCol = function(aCol, bCol){

        var trs = $("tr:gt(0)");
        var a,b;
        $.each(trs, function(i, v){
            a = $(this).children("td").eq(aCol).text();
            b = $(this).children("td").eq(bCol).text();
            $(this).children("td").eq(aCol).text(b);
            $(this).children("td").eq(bCol).text(a);
        });

    }

    $("#pop").on("click", ":button[name='DH']",function(){
        var a = $(this).siblings(":text[name='ACol']").val();
        var b = $(this).siblings(":text[name='BCol']").val();
        if(!a){
            alert("倒换失败,A列不能为空/0");
            return false;
        }

        if(!b){
            alert("倒换失败,B列不能为空/0");
            return false;
        }

        rotateCol(a, b);

    });


    $("#pop").on("click", "th",function(){

        removeSeleted();
        posIndex = $(this).index();
        setSelected();
    });

    $("#pop").on("click", ":button[name='cleanColSelected']",function(){
        cleanColSeleted();
    });

    $("#pop").on("click", ":button[name='delColSelected']",function(){
        deleteColSeleted();
        posIndex = 0;
    });

    $("#pop").on("click", ":button[name='delRowSelected']",function(){
        deleteRowSeleted();
    });

    $("#pop").on("change", ":checkbox[name='rowSelect']", function(){

        $(this).parent("td").siblings("td").css("background-color", "lightyellow");
       
        if( !$(this).is(":checked") ){

            $(this).parent("td").siblings("td").css("background-color", "white");
        }
        
    });




});