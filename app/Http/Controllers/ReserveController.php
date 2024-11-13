<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\Room;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createReserve(Request $request)
    {

        $validated = $request->validate([
            'room_id' => 'required',
            'date_reserve' => 'required',
        ]);
        $validated['status'] = 'pending';
        if (Reserve::validateDate($validated['date_reserve'], $validated['room_id'])){
            $reserve = new Reserve($validated);
            $reserve->save();
            return redirect('/home');
        }else{
            return back()->withErrors(['date_reserve' => 'Sala ocupada para la hora seleccionada '])->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserve $reserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserve $reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserve $reserve)
    {
        //
    }

    /**
     * Approve reserve
     */
    public function approveReserve(Reserve $reserve)
    {
        $reserve->status = 'accepted';
        $reserve->save();
        return redirect('/home');
    }

    /**
     * Approve reject
     */
    public function cancelReserve (Reserve $reserve)
    {
        $reserve->status = 'rejected';
        $reserve->save();
        return redirect('/home');
    }

    /**
     * Search reserves by room.
     */
    public function reserveSearch(Request $request)
    {
        $rooms = Room::where('eliminated', 0)->get();
        $reserves = Reserve::where('room_id', $request->all()['room_id'])->get();
        return view('home')->with(['rooms' => $rooms,'reserves' => $reserves]);
    }

}
