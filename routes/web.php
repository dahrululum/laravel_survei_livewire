<?php

use App\Livewire\Home;
use Livewire\Livewire;
use App\Livewire\About;
use App\Livewire\Login;
use App\Livewire\Rawdata;
use App\Livewire\EditRawdata;
use Illuminate\Support\Facades\Route;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\LogoutController;

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
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/skm2/livewire/update', $handle);
});
Route::middleware('auth')->group(function () {
    Debugbar::info('Saya adalah Debugers');
    Route::get('/about', About::class)->name('about');
    Route::get('/', Home::class)->name('home');
    //rawdata
    Route::get('/rawdata', Rawdata::class)->name('rawdata');
});



Route::get('/login',Login::class)->name('login')->middleware('guest');
Route::post('logout',LogoutController::class)->name('logout');


 