<?php

use Illuminate\Http\Request;

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

// This endpoint doesn't need authentication
Route::post('/signup/validate', 'RegisterController@store');

Route::group(['middleware' => 'jwt'], function () {
    Route::get('/auth', [
        'uses' => 'AuthController@index',
        'as'   => 'user.auth',
    ]);

    Route::post('/upload', [
        'uses' => 'UploadController@store',
        'as'   => 'upload.store'
    ]);

    Route::apiResource('users', 'UserController');
    Route::apiResource('users.addresses', 'UserAddressController');

    Route::apiResource('transactions', 'TransactionController', [
        'only' => ['index', 'show'],
    ]);

    Route::apiResource('activity', 'ActivityController', [
        'only' => ['index'],
    ]);

    Route::apiResource('user.activity', 'UserActivityController', [
        'only' => ['index'],
    ]);

    Route::apiResource('countries', 'CountryController', [
        'only' => ['index'],
    ]);

    Route::apiResource('sports', 'SportController', [
        'only' => ['index', 'show']
    ])->middleware('enable');

    Route::apiResource('seasons', 'SeasonController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('categories', 'CategoryController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('sport-events', 'SportEventController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('venues', 'VenueController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('players', 'PlayerController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('competitors', 'CompetitorController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('jerseys', 'JerseyController', [
        'only' => ['index', 'show']
    ]);

    Route::apiResource('tournaments', 'TournamentController', [
        'only' => ['index', 'show']
    ])->middleware('enable');
});

