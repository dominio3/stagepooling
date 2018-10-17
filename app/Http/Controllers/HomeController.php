<?php

namespace App\Http\Controllers;
use App\Models\Parking;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parking = Parking::all();
        return view('home')->with(compact($parking , 'parking'));
    }


}
