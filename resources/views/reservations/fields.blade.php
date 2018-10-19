<!-- Reservation Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reservation_code', 'Reservation Code:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-qrcode"></i>
      </div>
    {!! Form::text('reservation_code',$codigo ,  ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Parkings Id Field -->

    {!! Form::text('parkings_id', $parking_id->id, ['id'=>'select-parkings' , 'class' => 'form-control hidden']) !!}

<!-- Parkings Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parkings_id', 'Parkings Id:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-qrcode"></i>
      </div>
    {!! Form::text('parkings_code', $parking_id->parking_code,  ['id'=>'select-parkings' , 'class' => 'form-control' , 'disabled']) !!}
    </div>
</div>

<!-- Vehicules Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vehicules_id', 'Vehicules Id:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-car"></i>
      </div>
    {!! Form::select('vehicules_id', $vehicules, null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- State Field -->
<!--div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $states ,  null, ['class' => 'form-control']) !!}
</div-->
<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control hidden']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reservations.index') !!}" class="btn btn-default">Cancel</a>
</div>
