<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{

    /**
     * this function will return the route to the result declaration screen
     */
    public function gameResult($gameId){
        try {

            $token = session()->get('access_token');
            $response = Http::withToken($token)->get(Config::get('BaseConfig.BASE_URL').'game/player/'.$gameId);
            if($response->successful() ){
                $game =  json_decode(json_encode($response->json()), FALSE);
                return view('backend.screens.result',['game'=>$game]);
            }else{
                return view('backend.commons.404');
            }
        } catch (\Throwable $th) {
            return view('backend.commons.500');
        }
    }

    public function home(){
        return view('backend.screens.home');
    }

    public function admin(){

        
        if(!session()->has('access_token')){
            return view('backend.login');
        }
        return redirect('games');
    }

    public function adminLogin(Request $request){
        try {
            $parameters = json_encode($request->except(['_token']));
            $response = Http::post(Config::get('BaseConfig.BASE_URL').'admin/login', $request->except(['_token']));
            
            if($response->successful() ){
                $adminMaster =  json_decode(json_encode($response->json()), FALSE);
                $request->session()->put('access_token',$adminMaster->access_token);
                if($request->session()->has('access_token')){
                    return redirect()->intended('games');
                }
                
            }
            if($response->failed()){
                $messgae = json_decode($response->body(),false);
                return back()->with('errors', $messgae->message);
            }
        } catch (\Throwable $th) {
            
            return back()->with('errors', $th->getMessage());
        }
        
        
    }

    public function exit(){
        if(session()->has('access_token')){
            session()->forget('access_token');
            session()->flush();
            return redirect('admin');
        }
    }

}
