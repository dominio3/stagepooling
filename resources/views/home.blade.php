@extends('layouts.app')

@section('content')

  <meta charset="utf-8">
  <!-- jQuery 3 -->
  <script src="dashboard/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="dashboard/js/bootstrap.min.js"></script>
  <!-- ChartJS -->
  <script src="dashboard/js/Chart.js"></script>
  <!--=====================================
  CAJAS SUPERIORES
  ======================================-->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">

        <!-- small box -->
        <div class="small-box bg-aqua">

          <!-- inner -->
          <div class="inner">

            <h3>{!! \App\Models\Reservation::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

            <p>My Reservations</p>

          </div>
          <!-- inner -->

          <!-- icon -->
          <div class="icon">

            <i class="fa fa-tags"></i>

          </div>
          <!-- icon -->

          <a href="{!! url('/reservations') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

        </div>
        <!-- small-box -->

      </div>
      <div class="col-lg-3 col-xs-6">

        <!-- small box -->
        <div class="small-box bg-green">

          <!-- inner -->
          <div class="inner">

            <h3>{!! \App\Models\Stage::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

            <p>My Stages</p>

          </div>
          <!-- inner -->

          <!-- icon -->
          <div class="icon">

            <i class="fa fa-contao"></i>

          </div>
          <!-- icon -->

          <a href="{!! url('/stages') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

        </div>
        <!-- small box -->

      </div>
      <div class="col-lg-3 col-xs-6">

        <!-- small box -->
        <div class="small-box bg-yellow">

          <!-- inner -->
          <div class="inner">

            <h3>{!! \App\Models\Vehicule::all()->where('users_id','=',Auth::user()->id)->count() !!}</h3>

            <p>My Vehicules</p>

          </div>
          <!-- inner -->

          <!-- icon -->
          <div class="icon">

            <i class="fa fa-car"></i>

          </div>
          <!-- icon -->

          <a href="{!! url('/vehicules') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

        </div>
        <!-- small box -->

      </div>
      <div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-red">

            <!-- inner -->
            <div class="inner">

              <h3>{!! \App\Models\Parking::all()->where('state',"=",'Disponible')->count() !!}</h3>

              <p>Parkings</p>

            </div>
            <!-- inner -->

            <!-- icon -->
            <div class="icon">

              <i class="fa fa-map-o"></i>

            </div>
            <!-- icon -->

            <a href="{!! url('/parkings') !!}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
          <!-- small box -->
        </div>
    </div>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqvp2UBgVch-Mk7pT64-l3ks9Kfa4uOus&callback=initMap" async
          defer></script>
      <div id="map" style="width: 100%; height: 388px"></div>

  </div>

      <script type="text/javascript">

      var map, markers = [], infowindow;

      function initMap()
      {
        map = new google.maps.Map(document.getElementById('map'), {
        center:
         {
          lat: -34.6157437,
          lng: -58.5733832,
          },
        zoom: 8
      })

      infowindow = new google.maps.InfoWindow();
      @foreach ($parking as $par)
        var marker = {
          text:
           '<?php echo 'Parking Code : ' . $par->parking_code . '<br>Address : ' .  $par->stage_address . '<br>Locality : ' . $par->stage_locality. '<br>State : ' . $par->stage_state .'<br><a href="'. url('reservations/create/' . $par->id) .'">Reserve</a>' ?>',

          lat: {{ $par->stage_latitude}},
          lng: {{ $par->stage_longitude}}
        };
        markers.push(addMarker(marker));
      @endforeach
}
function addMarker(data) {
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(data.lat, data.lng),
        map: map,
        icon: data.icon
    });

    var html = "<b>" + data.text + "</b> <br/>"; //html del infowindow
    bindInfoWindow(marker, html); //creamos el infowindow
    return marker;


    /**marker.addListener('click', function() {
        console.log(marker.getPosition().lat());
        console.log(marker.getPosition().lng());
    });
    return marker;*/
}
/**
 *
 * función que permite añadir infowindows
 *
 * @param marker
 * @param html
 */
function bindInfoWindow(marker, html) {
    google.maps.event.addListener(marker, 'click', function (event) {
        infowindow.setContent(html);
        infowindow.position = event.latLng;
        infowindow.open(map, marker);
    });
}
</script>
@endsection
