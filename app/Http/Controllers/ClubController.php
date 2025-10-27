<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**Here is my ClubController

I created it with,

php artisan make:controller ClubController --resource

The role of the ClubController is to handle CRUD functionality

It acts as a bridge between the views and database 

**/



class ClubController extends Controller
{
    /*
    This function returns a view of all clubs being displayed. With all clubs being retrieved from the database and fed into it as a paramiter
    */

    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    /*
    This function returns a view of a form which allows the user to input info and create a club if admin.
    */

    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('clubs.index')->with('error', 'Unauthorized Access!');
        }
        return view('clubs.create');
    }

    /*
    This function validates the forms information and saves a new club to the database, redirecting the user to the index displaying a success message.
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

    /*
    The show method returns a view of the single club card displaying information with club information being passed into it
    */

    public function show(Club $club)
    {
        return view('clubs.show')->with('club', $club);
    }

    /*
    The edit method returns a view of the form with pre filled information of the selected club. This lets the user update information about the club. Variable $club is passed in so information about the selected club can be displayed.
    */

    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    /*
    The update method validates the information inputed int the form.  It updates the club in the database and rediretcts the user to the view all clubs/index with a success message, allowing he user to save edits to an existing club
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
           $image->move(public_path('images/clubs'), $imageName);

           $data['image'] = $imageName;
        }else{
            $imageName = null;
        }

        $club->update($data);

        return to_route('clubs.index')->with('success', 'Club edited successfully !');
    }

    /*
    The destroy method first deletes the clubs image and and rest of information from the database and redicts to the view all page.
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
