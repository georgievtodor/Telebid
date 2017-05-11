<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
    <html lang="en">
            <head> 
            <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
            <title>Title Goes Here</title> 
            <style>
            #map {
                width:100%;
                height: 500px;
            }
            </style>
            </head> 

            <body>
                <div id="map"></div>
            </body> 
            <footer>
            <!--<script type="text/javascript" src="http://api.eventful.com/js/api">

            </script>

            <script type="text/javascript">

            function show_alert()

            {

            var oArgs = {

                        app_key:"ZF8DQx6LN9zKpNPp",

                        date: "Last Week",

                        page_size: 15 ,

            };

            EVDB.API.call("/events/search", oArgs, function(oData) {
                console.log(oData.events.event);
                // Note: this relies on the custom toString() methods below

                });

            }

            show_alert();

            </script>-->













                <script>
                    function initMap() {
                        downloadUrl("http://telebid.pro/test/wordpress/data.php", function(data) {
                            console.log(data);
                            console.log(data.responseXML)
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(elem) {
                               var point = new google.maps.LatLng(
                                   parseFloat(elem.getAttribute('lat')),
                                   parseFloat(elem.getAttribute('lng'))
                               );

                               var marker = new google.maps.Marker({
                                   map: map,
                                   position: point
                               });
                            });
                        })

                        var centerCoords = new google.maps.LatLng(42.6977, 23.3219)

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: centerCoords,
                            zoom: 3
                        });
                        console.log(map)
                        var infoWindow = new google.maps.InfoWindow;

                        var marker = new google.maps.Marker({
                            position: centerCoords,
                            map: map
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

                function doNothing() {

                }


                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZtHMW4dtJH2YQyLHWD8Dyub0fTkdGXPM&callback=initMap">
                </script>

            </footer>
    </html> 