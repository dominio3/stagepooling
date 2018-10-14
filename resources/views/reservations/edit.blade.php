@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Reservation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reservation, ['route' => ['reservations.update', $reservation->id], 'method' => 'patch']) !!}

                        @include('reservations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection