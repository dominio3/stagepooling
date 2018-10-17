<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $reservation->id !!}</p>
</div>

<!-- Reservation Code Field -->
<div class="form-group">
    {!! Form::label('reservation_code', 'Reservation Code:') !!}
    <p>{!! $reservation->reservation_code !!}</p>
</div>

<!-- Parkings Id Field -->
<div class="form-group">
    {!! Form::label('parkings_id', 'Parkings Id:') !!}
    <p>{!! $reservation->parkings_id !!}</p>
</div>

<!-- Vehicules Id Field -->
<div class="form-group">
    {!! Form::label('vehicules_id', 'Vehicules Id:') !!}
    <p>{!! $reservation->vehicules_id !!}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    <p>{!! $reservation->state !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $reservation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $reservation->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $reservation->deleted_at !!}</p>
</div>
