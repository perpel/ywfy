(function ($) {
    $.fn.extend({
        "pop": function(options){
            //do something

        var defaults = {
            parent: $('#pop'),
            win: $(window),
            doc: $(document)
        };  

        // 根据所提供的扩展我们能的options
        var opts = $.extend(defaults, options);

            var eles = "<div class='pop'><div class='pop-close'>X</div><div class='pop-title'></div><div class='pop-content'></div><div class='pop-footer'></div></div>";
            var obj = $(eles).appendTo(opts.parent);

            //init popObj
            obj.width( opts.win.width() * 0.8);
            obj.height( opts.win.height() * 0.9);
            obj.children(".pop-content").height( opts.win.height() * 0.7);

            //close
            obj.children(".pop-close").click(function(){
                obj.remove();
            });

            //drag
            var dragObj = obj.children(".pop-title");
             var dragMove = function(oDrag, distX, distY){
            opts.doc.bind("mousemove", function(event){
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


            dragObj.mousedown(function(event){

                $(this).css("cursor", "crosshair");
                var oDrag = obj;
                var pos = oDrag.offset();
                var distX = event.pageX - pos.left;
                var distY = event.pageY - pos.top;
                dragMove(oDrag, distX, distY);

            }).mouseup(function(){

                $(this).css("cursor", "default");
                opts.doc.unbind("mousemove");
            });

        }
    });
})(window.jQuery);