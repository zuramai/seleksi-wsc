<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "index"])->middleware('auth');
Route::prefix('auth')->group(function() {
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('login', [AuthController::class,'login_post']);
    Route::post('logout', [AuthController::class,'logout']);
});

Route::resource('events', 'EventController');
Route::resource('events/{event}/tickets', 'TicketController');
Route::resource('events/{event}/sessions', 'SessionController');
Route::resource('events/{event}/channels', 'ChannelController');
Route::resource('events/{event}/rooms', 'RoomController');



Route::get('reports', [ReportController::class, 'index'])->name('reports.index');