<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );


?>


<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
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

                <script>

                    function initMap() {
                        var infoWindow = new google.maps.InfoWindow;
                        downloadUrl("http://telebid.pro/test/wordpress/data.php", function(data) {
                            console.log(data);
                            console.log(data.responseXML)
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(elem) {
                                var name = elem.getAttribute('name');
                                var adress = elem.getAttribute('adress');
                                var point = new google.maps.LatLng(
                                   parseFloat(elem.getAttribute('lat')),
                                   parseFloat(elem.getAttribute('lng'))
                               );

                               var infoWinContent = document.createElement('div');
                               var strong = document.createElement('strong');
                               strong.textContent = name;
                               infoWinContent.appendChild(strong);
                               infoWinContent.appendChild(document.createElement('br'));

                               var text = document.createElement('text');
                               text.textContent = adress;
                               infoWinContent.appendChild(text);


                                var marker = new google.maps.Marker({
                                   map: map,
                                   position: point
                               });
                                marker.addListener('click', function() {
                                    infoWindow.setContent(infoWinContent);
                                    infoWindow.open(map, marker);
                                });

                            });
                        })

                        var centerCoords = new google.maps.LatLng(42.6977, 23.3219)

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: centerCoords,
                            zoom: 3
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
    </html> -->
