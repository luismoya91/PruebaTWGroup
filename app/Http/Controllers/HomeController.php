<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::where('eliminated', 0)->get();
        $reserves = Reserve::with('room')->whereHas('room',function ($query) {
            $query->where('eliminated', 0);
        })->get();
        return view('home')->with(['rooms' => $rooms,'reserves' => $reserves]);
    }
}
