<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
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
    public function createRoom(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $room = new Room($validated);
        $room->save();
        return redirect('/home');
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
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editRoom(Room $room)
    {
        return view('/home')
        ->with(
            array(
                'room' => $room,
                'edit' => true,
                'rooms' => []
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateRoom(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $room->update($validated);
        $room->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyRoom(Room $room)
    {
        $room->eliminated = true;
        $room->save();
        return redirect('/home');
    }
}
