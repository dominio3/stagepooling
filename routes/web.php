<?php


Route::get('/', function () {
  return redirect('home');
});

Route::get('/reservations/create/{p}','ReservationController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('vehicules', 'VehiculeController');

Route::resource('stages', 'StageController');

Route::resource('parkings', 'ParkingController');

Route::resource('reservations', 'ReservationController');
