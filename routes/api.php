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

Route::get('/validate-ip', 'GeoIPValidationController@check');

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::get('email/verify/{user}', 'Auth\VerificationController@verify')
    ->name('verification.verify');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/email/verify-resend/{user}', 'Auth\VerificationController@resend');

Route::get('social/redirect/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('social/callback/{provider}', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/auth', [
        'uses' => 'AuthController@index',
        'as'   => 'user.auth',
    ]);

    Route::post('/password/change', [
        'uses' => 'ChangePasswordController@store',
        'as'   => 'user.auth',
    ]);

    Route::post('/upload', [
        'uses' => 'UploadController@store',
        'as'   => 'upload.store'
    ]);

    Route::apiResource('users', 'UserController');
    Route::apiResource('users.addresses', 'UserAddressController');

    Route::apiResource('wagers', 'WagerController');

    Route::apiResource('transactions', 'TransactionController', [
        'only' => ['index', 'show'],
    ]);

    Route::apiResource('activity', 'ActivityController', [
        'only' => ['index'],
    ]);

    Route::apiResource('user.activity', 'UserActivityController', [
        'only' => ['index'],
    ]);

    Route::get('/account-setup', 'AccountSetupController@index');

    Route::post('/kyc-verify/{user}', 'KYCController@verify');
    Route::get('/kyc-status/{user}/{type?}', 'KYCController@status');
    Route::post('/kyc-callback', [
        'uses' => 'KYCController@callback',
        'as' => 'kyc.callback'
    ]);
});

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

Route::apiResource('sport-events.competitors', 'SportEventCompetitorController', [
    'only' => ['index', 'show']
]);

Route::apiResource('sport-events.players', 'SportEventPlayerController', [
    'only' => ['index']
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

Route::apiResource('teams', 'TeamController', [
    'only' => ['index', 'show']
]);

