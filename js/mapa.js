/* ===========================================================
 * Google Maps
 * ===========================================================  */

          var iconosAlarma = {
              0: {
                icon: 'img/alarmON.png',
                animation: null,
              },
              1: {
                icon: 'img/alarmOFF.png',
                animation: null,
              },
              2: {
                icon: 'img/alarmAlert.png',
                animation: google.maps.Animation.BOUNCE,
              },
            };


            function load() {
              
              var map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(-34.65389092977185,-58.55814935000001),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                panControl: false,
                zoomControl: false,
                scaleControl: true,

                //Estilo personalizado
                styles:[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"},{"gamma":"1"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b4d4e1"}]}],        
      
              });//Cierre de map options

              var infoWindow = new google.maps.InfoWindow;

              downloadUrl("mapa.php", function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName("marker");
                
                for (var i = 0; i < markers.length; i++) {
                    var nombre = markers[i].getAttribute("nombre");
                    var direccion = markers[i].getAttribute("direccion");
                    var telefono = markers[i].getAttribute("telefono");
                    var link = markers[i].getAttribute("url");
                    
                    var permitir = markers[i].getAttribute("permitir_monitoreo");
                    
                    //Selecciono el estado en el que ese encuentra la alarma
                    var tipoAlarma= markers[i].getAttribute("estado");

                    var punto = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("latitud")),
                        parseFloat(markers[i].getAttribute("longitud")));
                    
                    
                    var html = '<div id="content">'+
                                    '<h4 id="cliente">'+ nombre +'</h4>'+
                                    '<p>'+ direccion +'</p>'+
                                    '<p>'+ telefono +'</p>'+
                                    '<a href="'+ link +'" target="_blank" ><button class="vercamaras"'+ permitir +'>Ver cámaras IP</button></a>'+
                                    '<a href="tel:911" target="_parent"><button class="llamada">Llamar al 911</button></a>'+ '<br>' +
                                    '<a href="tel:011548724" target="_parent"><button class="llamada">Alarma interna</button></a>'+ '<br>' +
                                '</div>';
                         
                  //Busco el estado de la alarma dentro de un array con todos los tipos
                  var icono= iconosAlarma[tipoAlarma] || {};

                  var marker = new google.maps.Marker({
                    map: map,
                    position: punto,
                    icon: icono.icon,
                    animation: icono.animation,

                  });

                  bindInfoWindow(marker, map, infoWindow, html);
                }

              });//Fin del bucle
                         
            }//Fin de funcion load

                    
            //function permitirMonitoreo(permitir){   }

            function bindInfoWindow(marker, map, infoWindow, html) {
              google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
              });
            }

            function downloadUrl(url, callback) {
              var request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;

              request.onreadystatechange = function() {
                if (request.readyState == 4) {
                  request.onreadystatechange = doNothing;
                  callback(request, request.status);
                }
              };

              request.open('GET', url, true);
              request.send(null);
            }

            function doNothing() {}



    

