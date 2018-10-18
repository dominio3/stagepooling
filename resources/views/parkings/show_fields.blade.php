<!-- API KEY : AIzaSyDUV3uA9XdReJdTxIGQsnTd7BhMrB4RdNk -->
<!--maps-->


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

        var marker = {
          lat: <?php  echo $parking->stages->latitude; ?>,
          lng: <?php  echo $parking->stages->longitude; ?>
        };

        addMarker(marker);

        var marker = {
          lat: <?php  echo $parking->stages->latitude; ?>,
          lng: <?php  echo $parking->stages->longitude; ?>
        };

        addMarker(marker);
        var marker = {
          lat: <?php  echo $parking->stages->latitude; ?>,
          lng: <?php  echo $parking->stages->longitude; ?>
        };

        addMarker(marker);
        var marker = {
          lat: <?php  echo $parking->stages->latitude; ?>,
          lng: <?php  echo $parking->stages->longitude; ?>
        };

        addMarker(marker);
}


</script>


<?php  //dd($parking->stages->latitude); ?>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $parking->id !!}</p>
</div>

<!-- Paking Code Field -->
<div class="form-group">
    {!! Form::label('parking_code', 'Paking Code:') !!}
    <p>{!! $parking->parking_code !!}</p>
</div>

<!-- Date Init Field -->
<div class="form-group">
    {!! Form::label('date_init', 'Date Init:') !!}
    <p>{!! $parking->date_init !!}</p>
</div>

<!-- Hour Init Field -->
<div class="form-group">
    {!! Form::label('hour_init', 'Hour Init:') !!}
    <p>{!! $parking->hour_init !!}</p>
</div>

<!-- Date End Field -->
<div class="form-group">
    {!! Form::label('date_end', 'Date End:') !!}
    <p>{!! $parking->date_end !!}</p>
</div>

<!-- Hour End Field -->
<div class="form-group">
    {!! Form::label('hour_end', 'Hour End:') !!}
    <p>{!! $parking->hour_end !!}</p>
</div>

<!-- Stages Id Field -->
<div class="form-group">
    {!! Form::label('stages_id', 'Stages Id:') !!}
    <p>Name : {!! $parking->stages->name !!}</p>
    <p>Addres : {!! $parking->stages->address !!}</p>
    <p>Locality : {!! $parking->stages->locality !!}</p>
    <p>Province : {!! $parking->stages->province !!}</p>
    <p>State : {!! $parking->stages->state !!}</p>
    <p>Latitude : {!! $parking->stages->latitude !!}</p>
    <p>Longitude : {!! $parking->stages->longitude !!}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    <p>{!! $parking->state !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $parking->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $parking->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $parking->deleted_at !!}</p>
</div>
