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
    //Route::get('gameType', 'admin\GameController@gameType'); // tempororily down
    Route::get('games', 'admin\GameController@getGames');
    

});
