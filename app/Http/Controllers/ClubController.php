<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource. Test
     */
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('image')){

           $imageName = time().'.'.$request->image->extension();
           $request->image->move(public_path('images/clubs'), $imageName);
        }

        Club::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('clubs.index')->with('success', 'Club created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return view('clubs.show')->with('club', $club);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
         $request->validate([
            'name' => 'required',
            'position' => 'required|integer',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'description']);

        if($request->hasFile('image')){
            $image = $request->file('image');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);

           $data['image'] = $imageName;
        }else{
            $imageName = null;
        }

        $club->update($data);

        return to_route('clubs.index')->with('success', 'Club edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        if ($club->image && Storage::disk('public')->exists($club->image)){
            Storage::disk('public')->delete($club->image);
        }

        $club->delete();

        return to_route('clubs.index')->with('success', 'Club deleted successfully !');
    }
}
