<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Club;
use Illuminate\Http\Request;

/**Here is my LeagueController

I created it with,

php artisan make:controller LeagueController --resource

Similiar to ClubController, the role of LeagueController is to handle CRUD functionality for the League resource

It allows for communication between the views and the League Model (database) 

**/

class LeagueController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $leagues = League::with('clubs')->get();
        return view('leagues.index', compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('leagues.index')->with('error', 'Access Denied!');
        }

        $clubs = Club::all();
        return view('leagues.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('leagues.index')->with('error', 'Access Denied !');
        }

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'clubs' => 'array', 
        ]);

        if($request->hasFile('image')){

           $imageName = time().'.'.$request->image->extension();

           $request->image->move(public_path('images/leagues'), $imageName);

           $validated['image'] = $imageName;
        }

        $league = League::create($validated);

        if ($request->has('clubs')){

            $league->clubs()->attach($request->clubs);

        }

        return redirect()->route('leagues.index')->with('success', 'League created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        $league->load('clubs');
        return view('leagues.show', compact('league'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        $clubs = Club::all();
        $leagueClubs = $league->clubs->pluck('id')->toArray();
        return view('leagues.edit', compact('league', 'clubs', 'leagueClubs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, League $league)
    {   
         $validated = $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'clubs' => 'array', 
        ]);

        $league->update($validated);

        if ($request->has('clubs')){
            $league->clubs()->sync($request->clubs);
        }

        return redirect()->route('leagues.index')->with('success','League updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {

        $league->clubs()->detach();

        $league->delete();

        return redirect()->route('leagues.index')->with('success','League deleted successfully !');

    }
}
