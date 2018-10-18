@extends('layouts.app')

@section('content')

<?php// dd($parking) ?>


      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf394KU3zoLLWVfGlhMRJNFLU-1tZINQA&callback=initMap" async
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

          @foreach ($parking as $par)
          var marker = {
            lat: {{ $par->stage_latitude}},
            lng: {{ $par->stage_longitude}}
          };
          addMarker(marker);
          @endforeach





      }


      </script>

@endsection
