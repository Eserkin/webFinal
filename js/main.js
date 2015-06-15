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


/* ===========================================================
 * Google Maps
 * ===========================================================  */

function initialize() {
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
        center: new google.maps.LatLng(-34.65389092977185,-58.55814935000001),
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false,
        panControl: false,
        zoomControl: false,
        scaleControl: true,
        
        //Estilo personalizado
        styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"},{"gamma":"1"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b4d4e1"}]}],        
      
      };//Cierre de map options

      var map = new google.maps.Map(mapCanvas, mapOptions);


        //Marcadores de posición

        var alarmON= "img/alarmON.png";
        var alarmOFF= "img/alarmOFF.png";

         var cliente1 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.66270386015551,-58.55197944176746),
             map: map,
             title: "Cliente 1",
             icon: alarmON,
             animation: google.maps.Animation.BOUNCE
          });

         var cliente2 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.67813007015743,-58.55449937713695),
             map: map,
             title: "Cliente 2",
             icon: alarmOFF,
          });

         var cliente3 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.66171715117526,-58.548578400736574),
             map: map,
             title: "Cliente 3",
             icon: alarmOFF,
          });

         var cliente4 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.6544893840885,-58.556501646166566),
             map: map,
             title: "Cliente 4",
             icon: alarmOFF,
          });

         var cliente5 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.64652399011975,-58.54905851615024),
             map: map,
             title: "Cliente 5",
             icon: alarmOFF,
          });

         var cliente6 = new google.maps.Marker({
             position: new google.maps.LatLng(-34.65693842339672,-58.53607662451816),
             map: map,
             title: "Cliente 6",
             icon: alarmOFF,
          });

      //var marcadores=[cliente1,cliente2,cliente3,cliente4,cliente5,cliente6];


         // CONTENIDO - Cuadro de Diálogo

        var contentString = '<div id="content">'+
                                '<h4 id="cliente">Nombre del cliente</h4>'+
                                '<p>Dirección del cliente </p>'+
                                '<p>Teléfono del cliente </p>'+
                                '<button class="vercamaras">Ver camaras ip</button>'+
                                '<br>'+
                                '<button class="llamada">Llamar 911</button>'+
                                '<br>'+
                                '<button class="llamada">Alarma interna</button>'+
                            '</div>'

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        google.maps.event.addListener(cliente1,'click',function(){
          infowindow.open(map, cliente1);
        });

        google.maps.event.addListener(cliente2,'click',function(){
          infowindow.open(map, cliente2);
        });

        google.maps.event.addListener(cliente3,'click',function(){
          infowindow.open(map, cliente3);
        });

        google.maps.event.addListener(cliente4,'click',function(){
          infowindow.open(map, cliente4);
        });

        google.maps.event.addListener(cliente5,'click',function(){
          infowindow.open(map, cliente5);
        });

        google.maps.event.addListener(cliente6,'click',function(){
          infowindow.open(map, cliente6);
        });

        
      
    /*  for(var i = 0, j = marcadores.length; i < j; i++){

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        google.maps.event.addListener(marcadores[i],'click',function(){
          infowindow.open(map, marcadores[i]);
        });
      }

    */
        
          

    }//Cierre de funcion initialize
    google.maps.event.addDomListener(window, 'load', initialize);

