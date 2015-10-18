(function ($) {
    $.fn.extend({
        "pop": function(options){
            //do something

        //param
        var defaults = {
            _parent: $('#pop'),
            _win: $(window),
            _doc: $(document),
            _width: "auto",
            _height: "auto",
            _size: "normal",
            _top: "20px",
            _left: "50px"
        };  

      // 根据所提供的扩展我们能的options
      var opts = $.extend(defaults, options);

      var eles = "<div class='pop'><div class='pop-close'></div><div class='pop-title'></div><div class='pop-content'></div><div class='pop-footer'></div></div>";
      var obj = $(eles).appendTo(opts._parent);

      obj.css({
        top: opts._top,
        left: opts._left,
      })
      //init popObj
      //init size()
      switch( opts._size ){

        case "normal":
          opts._width = opts._win.width() * 0.8;
          opts._height = opts._win.height() * 0.9;
          break;

        case "small":
          opts._width = opts._win.width() * 0.5;
          opts._height = opts._win.height() * 0.6;
          break;

        case "custom":
          break;

      }
      
      obj.width(opts._width);
      obj.height(opts._height);
      obj.children(".pop-content").height( opts._height * 0.8);

      //close
      obj.children(".pop-close").click(function(){
          obj.remove();
      });


            //drag
            var dragObj = obj.children(".pop-title");
            var dragMove = function(oDrag, distX, distY){
            opts._doc.bind("mousemove", function(event){
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
                opts._doc.unbind("mousemove");
            });


            return obj;

        }
    });
})(window.jQuery);