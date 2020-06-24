<?php

namespace App\Http\Controllers\API;

use App\GameMaster;
use App\UserGameMaster;
use App\UserMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;

class GameMasterController extends Controller
{

    /**
     * this function will return count of any particular column
     * parameter -
     * game_id
     * coulmn_name
     */
    public function totalCount($gameId){
        $ltotal = DB::table('user_game_master')
        ->select('l_num as num', DB::raw('count(l_num) as total'))
        ->where('game_id',$gameId)
        ->groupBy('l_num')
        ->orderBy(DB::raw('count(l_num)'),'DESC')
        ->take(1)
        ->first();
        
        
        $rtotal = DB::table('user_game_master')
        ->select('r_num as num', DB::raw('count(r_num) as total'))
        ->where('game_id',$gameId)
        ->groupBy('r_num')
        ->orderBy(DB::raw('count(r_num)'),'DESC')
        ->take(1)
        ->first();

        $ptotal = DB::table('user_game_master')
        ->select('pair_num as num', DB::raw('count(pair_num) as total'))
        ->where('game_id',$gameId)
        ->groupBy('pair_num')
        ->orderBy(DB::raw('count(pair_num)'), 'DESC')
        ->take(1)
        ->first();

        $result = array("Left"=>$ltotal,
                        "Right"=>$rtotal,
                        "Pair"=>$ptotal);

        return response()->json($result, 200);
    }



    /* this function will return all the users associated with requested game id
     */

     public function userInGame($gameId){

        try {
            $game = GameMaster::
            with('users.user')
            ->where('id',$gameId)->first();
            if($game!=null)
                return response()->json($game, 200);
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
        try {
            //where('created_on', '<=', now())->
            //whereDate('created_at', Carbon::today())->
            $gameMaster = GameMaster::
            withTotalPlayers()
            ->withDateFilter(Carbon::today())
            ->withActive(true)
            ->get();
            if($gameMaster!=null)
                return response()->json($gameMaster, 200);
            else
                return response()->json(['message'=>"No data available"], 401);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 403);
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tag_line' => 'required',
            'l_num_prize' => 'required',
            'r_num_prize' => 'required',
            'p_num_prize' => 'required',
            'is_offer' => 'required',
            'result_time' => 'required|unique:game_master'
        ], [
            'name.required' => 'Name is required',
            'tag_line.required' => 'Tag line is required',
            'l_num_prize.required' => 'Left number prize is required',
            'r_num_prize.required' => 'Right number prize is required',
            'p_num_prize.required' => 'Pair number prize is required',
            'is_offer.required' => 'Is offer is required',
            'result_time.required' => 'Result time is required',
            'result_time.unique' => 'A game is registered on this time',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
        
        try {
            $gameMaster = GameMaster::create($request->all());
            return response()->json($gameMaster, 200);
        } catch (\Throwable $th) {
            $message = "Could not save request!";
            return response()->json(['message'=>$message], 401);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameMaster  $gameMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GameMaster $gameMaster)
    {
        /* $header = $request->header();
        print_r($header);
        exit; */

        try {
            return response()->json($gameMaster, 200);
        } catch (\Throwable $th) {
            $message = "data not found!";
            return response()->json(['message'=>$message], 401);
        }
        
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameMaster  $gameMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameMaster $gameMaster)
    {
        try {
            $gameMaster->update($request->all());
            return response()->json($gameMaster, 200);
        } catch (\Throwable $th) {
            $message = "Could not update request!";
            return response()->json(['message'=>$message], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameMaster  $gameMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameMaster $gameMaster)
    {
        try {
            $gameMaster->delete();
            $message = "Deleted successfully!";
            return response()->json(['message'=>$message], 200);
        } catch (\Throwable $th) {
            //throw $th;
            $message = "No record available!";
            return response()->json(['message'=>$message], 401);
        }
    }
}
