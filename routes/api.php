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

    Route::apiResource('user', 'UserController');
    Route::apiResource('user.address', 'UserAddressController');

    Route::apiResource('transactions', 'TransactionController', [
        'only' => ['index', 'show'],
    ]);

    Route::group(['middleware' => 'sport_league'], function () {
        Route::apiResource('teams', 'TeamController');
        Route::apiResource('players', 'PlayerController');
    });

    Route::get('/auth/activities', 'ActivityController@index');
    Route::get('/auth/{user}/activities', 'UserActivityController@show');
});

