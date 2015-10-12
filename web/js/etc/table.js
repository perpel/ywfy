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

    $("#pop").on("click", "th",function(){

        removeSeleted();
        posIndex = $(this).index();
        setSelected();
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