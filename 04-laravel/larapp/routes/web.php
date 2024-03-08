<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/sayhello', function () {
    return "<h1> Hello TCO 2770672 </h1>";
});

Route::get('/pets/show', function () {
    $pets = App\Models\Pet::all();
    //echo var_dump($pets);
    dd($pets->toArray());  // Dump & Die
    
});


Route::get('/pets/view', function () {
    $pets = App\Models\Pet::all();

    return view('petsview')->with('pets', $pets);
    
    
});

Route::get('/users/show', function () {
    $users = App\Models\User::all();
    //echo var_dump($pets);
    dd($users->toArray());  // Dump & Die
    
});

Route::get('/users/view', function () {
    $users = App\Models\User::take(10)->get();

    return view('usersview')->with('users', $users);
});
