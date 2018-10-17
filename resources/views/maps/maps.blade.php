<!-- API KEY : AIzaSyDUV3uA9XdReJdTxIGQsnTd7BhMrB4RdNk -->
<!--maps-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUV3uA9XdReJdTxIGQsnTd7BhMrB4RdNk&callback=initMap" async
    defer></script>
<div id="map"></div>

<script type="text/javascript">

function addMarker(data) {
    new google.maps.Marker({
        position: new google.maps.LatLng(data.lat, data.lng),
        map: map
    });
}


function initMap()
{
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -34.6157437,
            lng: -58.5733832,
        },
        zoom: 8

    })

        var marker = {
          lat: -34.775147,
          lng: -58.2701046
        };

        addMarker(marker);
}


</script>
