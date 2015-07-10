/* ===========================================================
 * jquery-parallax
 * ===========================================================  */
jQuery(document).ready(function($){
  $('#parallax').mousemove(
    function(e){
      /* Detectar posicion del mouse */
      var offset = $(this).offset();
      var xPos = e.pageX - offset.left;
      var yPos = e.pageY - offset.top;

      /* Transformar la posición a porcentaje */
      var mouseXPercent = Math.round(xPos / $(this).width() * 100);
      var mouseYPercent = Math.round(yPos / $(this).height() * 100);

      /* Posicionar la capa */
      $(this).children('img').each(
        function(){
          var diffX = $('#parallax').width() - $(this).width();
          var diffY = $('#parallax').height() - $(this).height();

          var myX = diffX * (mouseXPercent / 100); //) / 100) / 2;


          var myY = diffY * (mouseYPercent / 100);


          var cssObj = {
            'left': myX + 'px',
            'top': myY + 'px'
          }
          //$(this).css(cssObj);
          $(this).animate({left: myX, top: myY},{duration: 50, queue: false, easing: 'linear'});

        }
      );

    }
  );
});



    

