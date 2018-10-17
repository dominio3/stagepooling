@extends('layouts.app')

@section('content')

<?php //dd($parking) ?>

<div class="container">
    <div class="row">

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

          @for ($i = 0; $i < 5; $i++)
          var marker = {
            lat: {{ $parking[$i]->stages_id}},
            lng: {{ $parking[$i]->stages_id}}
          };

          addMarker(marker);
          @endfor



      }


      </script>


    </div>
</div>
@endsection
