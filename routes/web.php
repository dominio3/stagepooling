<?php


Route::get('/', function () {
  return redirect('home');
});

Route::get('/maps', function () {
  return view('maps.maps');
});

Route::get('/reservations/create/{p}','ReservationController@create');

Route::get('profile', 'UserController@profile');

Route::post('profile' , 'UserController@updatePhoto');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('vehicules', 'VehiculeController');

Route::resource('stages', 'StageController');

Route::resource('parkings', 'ParkingController');

Route::resource('reservations', 'ReservationController');
