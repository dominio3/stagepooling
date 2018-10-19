@extends('layouts.app')

@section('content')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php if (Empty($user->photo)): ?>
                <img src="./uploads/photo/default.jpg" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <?php else: ?>
                  <img src="./uploads/photo/{{ $user->photo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <?php endif; ?>
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="photo" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row"></div>
                <button type="submit" class="pull-right btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-arrow-up"></span> Subir
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
