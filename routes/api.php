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

    Route::patch('/upload/{upload}', [
        'uses' => 'UploadController@update',
        'as'   => 'upload.update'
    ]);

    Route::apiResource('user', 'UserController');
    Route::apiResource('user.address', 'UserAddressController');
});

// Route::get('/private-scoped', function (Request $request) {
//     return response()->json([
//         "message" => "Hello from a private endpoint! You need to have a valid Access Token and a scope of read:messages to see this."
//     ]);
// })->middleware('check.scope:read:messages');

