<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::get('events', 'API\EventController@index');
    Route::get('organizers/{organizer}/events/{event}', 'API\EventController@show');

    Route::post('/login', 'API\AuthController@login');
    Route::post('organizers/{organizer}/events/{event}/registration', 'API\EventController@registration');
});