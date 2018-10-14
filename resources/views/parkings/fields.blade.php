@php
use App\Models\Parking;
@endphp

<!-- Paking Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paking_code', 'Paking Code:') !!}
    {!! Form::text('paking_code', $codigo ,  ['class' => 'form-control']) !!}
</div>

<!-- Date Init Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_init', 'Date Init:') !!}
    {!! Form::date('date_init', $parking->date_init,  ['class' => 'form-control']) !!}
</div>

<!-- Hour Init Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_init', 'Hour Init:') !!}
    {!! Form::time('hour_init', null, ['class' => 'form-control']) !!}
</div>

<!-- Date End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_end', 'Date End:') !!}
    {!! Form::date('date_end', $parking->date_end ,   ['class' => 'form-control']) !!}
</div>

<!-- Hour End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour_end', 'Hour End:') !!}
    {!! Form::time('hour_end', null, ['class' => 'form-control']) !!}
</div>

<!-- Stages Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stages_id', 'Stages Id:') !!}
    {!! Form::select('stages_id', $stages, null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state', $states, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parkings.index') !!}" class="btn btn-default">Cancel</a>
</div>
