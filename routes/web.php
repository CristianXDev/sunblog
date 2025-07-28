<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


//PAGES
use App\Filament\Pages\ViewPost;

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

//HOME
Route::get('/', function () {
    return view('home.index');
});

Route::get('dashboard/view-post/{id}', ViewPost::class)->name('view-post');