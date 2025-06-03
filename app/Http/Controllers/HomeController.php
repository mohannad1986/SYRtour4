<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\City;
use App\Models\Town;
use App\Models\Facility;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\SessionGuard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        // $this->middleware('auth:tourist');
        $this->middleware('auth:owner,tourist,web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {


    $cities=City::with('images')->with('categories')->get();

        return view('tourist.cities',compact('cities'));

    }



}
