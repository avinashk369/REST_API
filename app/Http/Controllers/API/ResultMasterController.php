<?php

namespace App\Http\Controllers\API;

use App\UserGameMaster;
use App\GameMaster;
use App\WinnerMaster;
use App\ResultMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;

class ResultMasterController extends Controller
{

    /**
     * Return result of particular game
     *
     * @return \Illuminate\Http\Response
     */
    public function gameResult($gameId)
    {
        try {
            $resultMaster = ResultMaster::where('game_id',$gameId)->with('game.users')->first();
            if($resultMaster!=null)
                return response()->json($resultMaster, 200);
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
            //list only active game mean today game only , use flag bit 1 for this
            $resultMaster = ResultMaster::get();
            if($resultMaster!=null)
                return response()->json($resultMaster, 200);
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
            'game_id' => 'required',
            'l_num' => 'required',
            'r_num' => 'required',
            'pair_num' => 'required',
        ], [
            'game_id.required' => 'Game id is required',
            'l_num.required' => 'Left number is required',
            'r_num.required' => 'Right number is required',
            'pair_num.required' => 'Pair number is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }

        //Database transaction
        DB::beginTransaction();
        try {
            $ResultMaster = ResultMaster::create($request->all());  
            /**
             * get all the users against game id
             */
            $winnerData = UserGameMaster::with(['games.users','games.result','games' => function($query){
                GameMaster::withActive($query,true);
            }])
            ->where('game_id',$request['game_id'])
            ->has('games.result')
            ->get();
           
            
            foreach($winnerData as $winner){
                if(is_null($winner->games) ){
                    DB::rollback();
                    return response()->json(['message'=>'somthing went wrong with given games'], 401);
                }else{

                    $isWin=0;
                    $winningAmount=0;
                    if(($winner->is_left == 1) && ($winner->l_num == $winner->games->result->l_num)){
                        $isWin = 1;
                        $winningAmount=$winner->games->l_num_prize;
                    }
                    if(($winner->is_right == 1) && ($winner->r_num == $winner->games->result->r_num)){
                        $isWin = 1;
                        $winningAmount=$winner->games->r_num_prize;
                    }
                    if($winner->pair_num == $winner->games->result->pair_num){
                        $isWin = 1;
                        $winningAmount=$winner->games->p_num_prize;
                    }

                    try {
                        //save winner master
                        $winnerMaster = new WinnerMaster();
                        $winnerMaster->user_id = $winner->user_id;
                        $winnerMaster->user_game_id = $winner->id;
                        $winnerMaster->game_id = $winner->game_id;
                        $winnerMaster->winning_amount = $winningAmount;
                        $winnerMaster->is_win = ($isWin==1) ? "1":"0";
                        $winnerMaster->is_lost = ($isWin==1) ? "0":"1";
                        $winnerMaster = $winnerMaster->save();  

                        //update game master
                        $winner->games->flags = '00000';
                        $winner->games->update();

                    } catch (\Throwable $th) {
                        //throw $th;
                        DB::rollback();
                        return response()->json(['message'=>$th->getMessage()], 401);
                    }
                }
                
            }
            DB::commit();
            return response()->json($winnerData, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            $message = "Could not save request!";
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ResultMaster $resultMaster)
    {
        try {
            return response()->json($resultMaster, 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultMaster $resultMaster)
    {
        try {
            $resultMaster->update($request->all());
            return response()->json($resultMaster, 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResultMaster  $resultMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultMaster $resultMaster)
    {
        try {
            $resultMaster->delete();
            $message = "Deleted successfully!";
            return response()->json(['message'=>$message], 200);
        } catch (\Throwable $th) {
            //throw $th;
            $message = "No record available!";
            return response()->json(['message'=>$message], 401);
        }
    }
}
