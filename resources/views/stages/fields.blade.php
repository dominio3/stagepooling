<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-tag"></i>
      </div>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-map-pin"></i>
      </div>
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Locality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('locality', 'Locality:') !!}
    {!! Form::text('locality', null, ['class' => 'form-control']) !!}
</div>

<!-- Province Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province', 'Province:') !!}
    {!! Form::text('province', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-map-marker"></i>
      </div>
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-map-marker"></i>
      </div>
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', 'Observation:') !!}
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-binoculars"></i>
      </div>
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
      </div>
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::text('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $states , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Estado']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stages.index') !!}" class="btn btn-default">Cancel</a>
</div>
