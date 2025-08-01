<?php

//ROUTES
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

//PAGES FILAMENT
use App\Filament\Pages\ViewPost;

//CONTROLLERS
use App\Http\Controllers\HomeController;

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

//HOME - BLOG
Route::get('/blog', [HomeController::class, 'blog'])->name('home-blog');

//HOME - VIEW POST
Route::get('/post/{id}', [HomeController::class, 'post'])->name('home-post');

//DASHBOARD - VIEW-POST
Route::get('dashboard/view-post/{id}', ViewPost::class)->name('view-post');