<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\UserMaster;
use App\WinnerMaster;
use App\UserGameMaster;
use App\GameMaster;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Return all result for the user
     *
     * @return \Illuminate\Http\Response
     */
    public function gameResult($userId)
    {
        try {
            $winnerMaster = WinnerMaster::where('user_id',$userId)->with('usergames.games')->get();
            if($winnerMaster!=null)
                return response()->json($winnerMaster, 200);
            else
                return response()->json(['message'=>"No data available"], 401);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 403);
        }
    }

    /**
     * Return all game for the user
     *
     * @return \Illuminate\Http\Response
     */
    public function games($userId)
    {
        try {
            // list all the games which are active and created_at is today date
            $userGameMaster = UserGameMaster::where('user_id',$userId)
            ->with(['games' => function($query){
                    GameMaster::withTotalPlayers($query);
                    GameMaster::withActive($query,true);
                    GameMaster::withDateFilter($query,Carbon::today());
                }
                ])
            ->get();
            
            if(count($userGameMaster)>0)
                return response()->json($userGameMaster, 200);
            else
                return response()->json(['message'=>"No data available"], 401);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 403);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserMaster  $userMaster
     * @return \Illuminate\Http\Response
     */
    public function show(UserMaster $userMaster)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserMaster  $userMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMaster $userMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserMaster  $userMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMaster $userMaster)
    {
        //
    }
}
