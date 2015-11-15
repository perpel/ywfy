$(function(){

    var tid = $("#tid").val();
    $(".case-number").on("dblclick", "tr:gt(0)", function(){

       var _casenumber = $(this).find("td").eq(0).text();
        var _case = $(this).find("td").eq(1).text();
        var _litigantone = $(this).find("td").eq(2).text();
        var _litiganttwo = $(this).find("td").eq(3).text();
        var _supervise = $(this).find("td").eq(4).text();
        var _supervisetel = $(this).find("td").eq(5).text();
        var _undertaker = $(this).find("td").eq(6).text();
        var _undertakertel = $(this).find("td").eq(7).text();
        
        $("#" + tid + "-casenumber", parent.frames[0].document).val(_casenumber);
        $("#" + tid + "-case", parent.frames[0].document).val(_case);
        $("#" + tid + "-litigantone", parent.frames[0].document).val(_litigantone);
        $("#" + tid + "-litiganttwo", parent.frames[0].document).val(_litiganttwo);
        $("#" + tid + "-supervise", parent.frames[0].document).val(_supervise);
        $("#" + tid + "-supervisetel", parent.frames[0].document).val(_supervisetel);
        $("#" + tid + "-undertaker", parent.frames[0].document).val(_undertaker);
        $("#" + tid + "-undertakertel", parent.frames[0].document).val(_undertakertel);
        
    });

$(".case-number").find("tr:gt(0)").mousemove(function(){

    $(this).siblings("tr").children("td").css("background-color", "white");
    $(this).children("td").css("background-color", "lightgreen");

});

  });