<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Login;
use App\Livewire\Rawdata;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\LogoutController;
use App\Livewire\EditRawdata;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Debugbar::info('Saya adalah Debugers');
    Route::get('/about', About::class)->name('about');
    Route::get('/', Home::class)->name('home');
});



Route::get('/login',Login::class)->name('login')->middleware('guest');
Route::post('logout',LogoutController::class)->name('logout');

//rawdata
Route::get('/rawdata', Rawdata::class)->name('rawdata');
Route::get('/editrawdata/{id}', EditRawdata::class)->name('editrawdata');
