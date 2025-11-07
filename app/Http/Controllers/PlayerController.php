<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Club;
use Illuminate\Http\Request;

class PlayerController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Club $club)
    {

        //This valiates the data inputed into the form

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'goals' => 'required|integer',
            'assits' => 'required|integer',
            'position' => 'required|string|max:50',
        ]);

        //This creates a new player associated with the club passed in as a parameter

        $club->players()->create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'goals' => $request->input('goals'),
            'assits' => $request->input('assits'),
            'position' => $request->input('position'),
        ]);

        return redirect()->route('clubs.show', $club)->with('Success', 'Player added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
