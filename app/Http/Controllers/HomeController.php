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
        $parking = Parking::join('stages' , 'parkings.stages_id' , '=' , 'stages.id')
                        ->select('stages.latitude  as stage_latitude' ,
                                 'stages.longitude  as stage_longitude',
                                 'stages.address  as stage_address',
                                 'stages.locality  as stage_locality',
                                 'stages.state  as stage_state')->get();
        return view('home')->with(compact($parking , 'parking'));
    }


}
