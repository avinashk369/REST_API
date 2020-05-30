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

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');

Route::middleware('auth:api')->group(function () {
    
    //Route::get('/users', 'API\UserController@list');//get all users
    Route::apiResources([
        'game' => 'API\GameMasterController', //CRUD action
        'gameType' => 'API\GameTypeController',
        'kyc' => 'API\KycMasterController',
        'offer' => 'API\OfferMasterController', // NOT in v1
        'result' => 'API\ResultMasterController',
        'transaction' => 'API\TransactionMasterController',
        'userGame' => 'API\UserGameMasterController',
        'wallet' => 'API\WalletMasterController',
        'winner' => 'API\WinnerMasterController',
        'withdraw' => 'API\WithdrawMasterController',
    ]);
});
