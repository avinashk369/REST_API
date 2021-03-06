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

Route::post('admin', 'API\AdminController@register');
Route::post('admin/login', 'API\AdminController@login');
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');


Route::middleware('auth:api')->group(function () {
    
    //Route::get('/users', 'API\UserController@list');//get all users
    //this API will return result of any particular game
    Route::get('result/game/{gameId}', 'API\ResultMasterController@gameResult');
    //this API will return all the game's result based on user id
    //this API will help admin to check how many users are winner in any game
    Route::get('winner/game/{userId}', 'API\WinnerMasterController@gameResult');
    Route::get('transaction/history/{userId}', 'API\TransactionMasterController@history');
    Route::get('user/game/{userId}', 'API\UserController@games');
    //this API will return all the game's result based on user id
    //this API will return users list of games with its result
    Route::get('user/gameResult/{userId}', 'API\UserController@gameResult');
    Route::get('game/player/{gameId}', 'API\GameMasterController@userInGame');
    Route::get('game/stats/{gameId}', 'API\GameMasterController@totalCount');
    Route::get('user/wallet/{userId}', 'API\WalletMasterController@walletDetail');
    
    

    Route::apiResources([
        'game' => 'API\GameMasterController', //CRUD action
        'user' => 'API\UserController',
        'gameType' => 'API\GameTypeController', //CRUD action
        'kyc' => 'API\KycMasterController',
        'offer' => 'API\OfferMasterController', // NOT in v1
        'result' => 'API\ResultMasterController', //CR action
        'transaction' => 'API\TransactionMasterController', //CR action
        'userGame' => 'API\UserGameMasterController', //CR action
        'wallet' => 'API\WalletMasterController', //C action
        'winner' => 'API\WinnerMasterController', //CR action
        'withdraw' => 'API\WithdrawMasterController', // C action
    ]);
});
