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
//Route::post('register', 'API\RegisterController@register', 'api_register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\v1\RegisterController@login')->name('api_auth');
    Route::post('register', 'API\v1\RegisterController@register')->name('api_register');

    Route::group(
        [
        'middleware' => 'auth:api'
    ],
         function() {
//             dd(Auth::guard());
        Route::get('logout', 'API\v1\RegisterController@logout');
//        Route::get('user', 'API\v1\RegisterController@user');
    });
});



