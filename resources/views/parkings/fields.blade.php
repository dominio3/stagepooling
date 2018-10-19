@php
use App\Models\Parking;
@endphp

<!-- Paking Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parking_code', 'Paking Code:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-qrcode"></i>
      </div>
    {!! Form::text('parking_code', $codigo , ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Date Init Field -->
<div class="form-group col-sm-6">
  {!! Form::label('date_init', 'Date Init:') !!}
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
    {!! Form::date('date_init', $parking->date_init,  ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Hour Init Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_init', 'Hour Init:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </div>
    {!! Form::time('hour_init', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Date End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_end', 'Date End:') !!}
  <div class="input-group">
    <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
    </div>
      {!! Form::date('date_end', $parking->date_end ,   ['class' => 'form-control']) !!}
    </div>
  </div>


<!-- Hour End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_end', 'Hour End:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </div>
    {!! Form::time('hour_end', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Stages Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stages_id', 'Stages Id:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-home"></i>
      </div>
    {!! Form::select('stages_id', $stages, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-check"></i>
      </div>
    {!! Form::select('state', $states, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parkings.index') !!}" class="btn btn-default">Cancel</a>
</div>
