<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Here we call/use our ClubController in order to merge our routes and functions
*/

use App\Http\Controllers\ClubController;

/**Here is my web.php

This was created automatically when I created this web app,

The role of the web.php is to define all web routes

Routes decide what function to call when a button or link is clicked

**/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    /*
    Within our views, we will be calling routes such as show, edit and create
    */ 

    /*
    Here Route:get lets laravel know this is a get request, this is what happens when your browser makes when visiting a page

    /clubs is the url path. When the user goes to /clubs this route will be triggered

    [ClubController::class, 'index'] tells laravel which method to use from the imported Controller

    Then finally ->name('clubs.index');
    This gives the route a name to be called when being used in views or redirects
    */

    Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::get('/clubs/{club}', [ClubController::class, 'show'])->name('clubs.show');

    /*
    Post here tells laravel this is a post request. Post requests occur when a form is sumbitted. This will occur when a submit button is clciked when creating a club for example.
    */

    Route::post('/clubs', [ClubController::class, 'store'])->name('clubs.store');

    /*
    Typically within forms we will call the store, destroy or update routes, typically associated with buttons.
    */

    Route::get('/clubs/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/clubs/{club}', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/clubs/{club}', [ClubController::class, 'destroy'])->name('clubs.destroy');

});



require __DIR__.'/auth.php';
