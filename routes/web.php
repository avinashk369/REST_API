<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
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

Route::get('admin', 'admin\AdminController@admin');
Route::post('login', 'admin\AdminController@adminLogin');

Route::middleware([AdminAuth::class])->group(function () {
    
    Route::get('home', 'admin\AdminController@home');
    Route::get('exit', 'admin\AdminController@exit');
    Route::get('gameType', 'admin\GameController@gameType'); // tempororily down
    Route::get('games', 'admin\GameController@getGames');
    Route::get('game/add', 'admin\GameController@addGame');
    Route::post('game/add', 'admin\GameController@saveGame');
    Route::get('game/edit/{gameId}', 'admin\GameController@editGame');
    Route::get('game/{gameId}', 'admin\GameController@gameDetail');
    Route::get('game/result/{gameId}', 'admin\AdminController@gameResult');
    Route::post('game/saveResult/{gameId}', 'admin\GameController@saveResult');

});
