<?php

namespace App\Http\Controllers\API;

use App\GameType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

class GameTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $gameType = GameType::get();
            if($gameType!=null)
                return response()->json($gameType, 200);
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
        ], [
            'name.required' => 'Game type name is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
        
        try {
            $gameType = GameType::create($request->all());    
            return response()->json($gameType, 200);
        } catch (\Throwable $th) {
            $message = "Could not save request!";
            return response()->json(['message'=>$message], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameType  $gameType
     * @return \Illuminate\Http\Response
     */
    public function show(GameType $gameType)
    {
        try {
            return response()->json($gameType, 200);
        } catch (\Throwable $th) {
            $message = "data not found!";
            return response()->json(['message'=>$message], 401);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameType  $gameType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameType $gameType)
    {
        try {
            $gameType->update($request->all());
            return response()->json($gameType, 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameType  $gameType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameType $gameType)
    {
        try {
            $gameType->delete();
            $message = "Deleted successfully!";
            return response()->json(['message'=>$message], 200);
        } catch (\Throwable $th) {
            //throw $th;
            $message = "No record available!";
            return response()->json(['message'=>$message], 401);
        }
    }
}
