<!-- Reservation Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reservation_code', 'Reservation Code:') !!}
    {!! Form::text('reservation_code',$codigo ,  ['class' => 'form-control']) !!}
</div>

<!-- Parkings Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parkings_id', 'Parkings Id:') !!}
    {!! Form::select('parkings_id', $parkings , null, ['id'=>'select-parkings' , 'class' => 'form-control' , 'placeholder' => 'Selecione Parking']) !!}
</div>

<!-- Vehicules Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicules_id', 'Vehicules Id:') !!}
    {!! Form::select('vehicules_id', $vehicules, null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<!--div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $states ,  null, ['class' => 'form-control']) !!}
</div-->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reservations.index') !!}" class="btn btn-default">Cancel</a>
</div>
