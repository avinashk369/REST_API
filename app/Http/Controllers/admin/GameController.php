<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GameType;
use Validator;
use Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function gameType(){

        try {
            $token = session()->get('access_token');
            $response = Http::withToken($token)->get(Config::get('BaseConfig.BASE_URL').'gameType');
            if($response->successful() ){
                $gameTypes =  json_decode(json_encode($response->json()), FALSE);
                return view('backend.screens.gametypes',['game_types'=>$gameTypes]);
            }else{
                return view('backend.commons.404');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return view('backend.commons.500');
        }
    	
    }

    /**
     * this function will return all the available games
     */
    public function getGames(){
        try {
            $token = session()->get('access_token');
            $response = Http::withToken($token)->get(Config::get('BaseConfig.BASE_URL').'game');
            if($response->successful() ){
                $games =  json_decode(json_encode($response->json()), FALSE);
                return view('backend.screens.games',['games'=>$games]);
            }else{
                return view('backend.commons.404');
            }
        } catch (\Throwable $th) {
            return view('backend.commons.500');
        }
    }
}
