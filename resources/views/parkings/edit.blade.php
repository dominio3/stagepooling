@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parking
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parking, ['route' => ['parkings.update', $parking->id], 'method' => 'patch']) !!}

                        @include('parkings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
