let entry = document.getElementsByClassName('entry-header')[0];
let selector = document.createElement('select');
let entries = {}


function initMap() {
    var infoWindow = new google.maps.InfoWindow;

    downloadUrl("http://telebid.pro/test/wordpress/data.php", function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function (elem) {
            var name = elem.getAttribute('name');
            var adress = elem.getAttribute('adress');

            var point = new google.maps.LatLng(
                parseFloat(elem.getAttribute('lat')),
                parseFloat(elem.getAttribute('lng'))
            );

            entries[name] = true;

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

            marker.addListener('click', function () {
                infoWindow.setContent(infoWinContent);
                infoWindow.open(map, marker);
            });

        });
        
        Array.prototype.forEach.call(Object.keys(entries), function(entry) {
            let option = document.createElement('option');
            option.value = entry;
            option.text = entry;
            selector.appendChild(option);
        });

        entry.appendChild(selector);
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

    request.onreadystatechange = function () {
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
