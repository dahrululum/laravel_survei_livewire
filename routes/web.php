<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth')->group(function () {
    Route::get('/about', About::class)->name('about');
    Route::get('/', Home::class)->name('home');
});



Route::get('/login',Login::class)->name('login')->middleware('guest');
Route::post('logout',LogoutController::class)->name('logout');