$(function(){

    var tid = $("#tid").val();
    $(".case-number").on("dblclick", ".tr", function(){
        var _casenumber = $(this).find(".td0").text();
        var _case = $(this).find(".td1").text();
        var _litigantone = $(this).find(".td2").text();
        var _litiganttwo = $(this).find(".td3").text();
        //var _supervise = $(this).find("td").eq(4).text();
        //var _supervisetel = $(this).find("td").eq(5).text();
        var _undertaker = $(this).find(".td4").text();
        var _entrustdepartment = $(this).find(".td5").text();
        
        $("#" + tid + "-casenumber", parent.frames[0].document).val(_casenumber);
        $("#" + tid + "-case", parent.frames[0].document).val(_case);
        $("#" + tid + "-litigantone", parent.frames[0].document).val(_litigantone);
        $("#" + tid + "-litiganttwo", parent.frames[0].document).val(_litiganttwo);
        //$("#" + tid + "-supervise", parent.frames[0].document).val(_supervise);
        //$("#" + tid + "-supervisetel", parent.frames[0].document).val(_supervisetel);
        $("#" + tid + "-undertaker", parent.frames[0].document).val(_undertaker);
        $("#" + tid + "-entrustdeparment", parent.frames[0].document).val(_entrustdepartment);
      
    });

	$(".case-number").find(".tr").click(function(){

		$(this).siblings(".tr").children("div").css("background-color", "#D9D9D9");
		$(this).children("div").css("background-color", "lightgreen");

	});

});