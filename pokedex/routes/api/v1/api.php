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
//Pokedex
Route::apiResource('pokedex', 'PokedexController');
Route::apiResource('user', 'UserController');
//Users

//SEARCH
Route::get('search-user', 'UserController@search');

Route::post('/login', 'api\v1\LoginController@login');
Route::post('/register', 'api\v1\LoginController@register');
Route::post('/logout', 'api\v1\LoginController@logout');


// Route::prefix('/user')->group ( function() {
//     Route::post('/logout', 'api\v1\LoginController@logout');
    
//     });
    
Route::post('/gacem', 'api\v1\LoginController@gacem')->middleware('auth:api');