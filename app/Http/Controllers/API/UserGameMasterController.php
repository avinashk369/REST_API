<?php

namespace App\Http\Controllers\API;

use App\UserGameMaster;
use App\GameMaster;
use App\WalletMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;

class UserGameMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //list only active game mean today game only , use flag bit 1 for this
            $userGameMaster = UserGameMaster::with(['games' => function($query){
                    GameMaster::withActive($query,true);
            }
            ])
            ->get();
            if($userGameMaster!=null)
                return response()->json($userGameMaster, 200);
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
            'user_id' => 'required',
            'game_id' => 'required',
            'bet_amount' => 'required',
        ], [
            'user_id.required' => 'User id is required',
            'game_id.required' => 'Game id is required',
            'bet_amount.required' => 'Bet amount is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
        
        //DB transaction
        DB::beginTransaction();
        try {
            $userGameMaster = UserGameMaster::create($request->all());  
            $walletMaster = WalletMaster::where('user_id',$userGameMaster->user_id)->first();
            if(!is_null($walletMaster)){
                $walletMaster->avl_amount = $walletMaster->avl_amount - $userGameMaster->bet_amount; 
                $walletMaster->save();
            }else{
                DB::rollback();
                $message = "Could not save request!";
                return response()->json(['message'=>$message], 401);
            } 
            DB::commit();
            return response()->json($userGameMaster, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            $message = "Could not save request!";
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserGameMaster  $userGameMaster
     * @return \Illuminate\Http\Response
     */
    public function show(UserGameMaster $userGameMaster)
    {
        try {
            return response()->json($userGameMaster, 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserGameMaster  $userGameMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserGameMaster $userGameMaster)
    {
        try {
            $userGameMaster->update($request->all());
            return response()->json($userGameMaster, 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserGameMaster  $userGameMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserGameMaster $userGameMaster)
    {
        try {
            $userGameMaster->delete();
            $message = "Deleted successfully!";
            return response()->json(['message'=>$message], 200);
        } catch (\Throwable $th) {
            //throw $th;
            $message = "No record available!";
            return response()->json(['message'=>$message], 401);
        }
    }
}
