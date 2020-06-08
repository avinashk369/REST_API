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
    /**
     * this function will return all the game types
     */
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

    /**
     * this function will render new game add screen
     */

     public function addGame(){
        return view('backend.screens.addgames');
     }

     public function editGame($gameId){
         echo $gameId;
         exit;
        return view('backend.screens.addgames');
     }

     /**
      * this function will save new game in the database
      */

      public function saveGame(Request $request){

        try {
            $todays = substr(now(),0,10);
            $request['result_time'] =  $todays." ".$this->convertTime($request['result_time']);
            $parameters = json_encode($request->except(['_token']));
            $token = session()->get('access_token');
            $response = Http::withToken($token)->post(Config::get('BaseConfig.BASE_URL').'game', $request->except(['_token']));
            
            if($response->successful() ){
                return back()->with('success','saved successfully');
                //return redirect()->intended('home');
            }
            if($response->failed()){
                $messgae = json_decode($response->body(),false);
                return back()->withErrors($messgae->message);
            }
        } catch (\Throwable $th) {
            
            return back()->withErrors($th->getMessage());
        }
      }

      protected function convertTime($timeInput){
        return date("H:i:s", strtotime($timeInput));
      }
}
