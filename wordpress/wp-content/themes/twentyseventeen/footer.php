<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<!--<div id="map"></div>-->
			</div><!-- .wrap -->
<!--				
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
                </script>-->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
