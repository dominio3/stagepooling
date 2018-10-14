<!-- Patent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patent', 'Patent:') !!}
    {!! Form::text('patent', null, ['class' => 'form-control']) !!}
</div>

<!-- Trademark Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trademark', 'Trademark:') !!}
    {!! Form::text('trademark', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $states ,  null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', 'Observation:') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::number('users_id', Auth::user()->id , ['class' => 'form-control hidden']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vehicules.index') !!}" class="btn btn-default">Cancel</a>
</div>
