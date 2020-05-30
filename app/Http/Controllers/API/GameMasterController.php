<?php

namespace App\Http\Controllers\API;

use App\GameMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class GameMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $gameMaster = GameMaster::get();
            if($gameMaster!=null)
                return response()->json($gameMaster, 200);
            else
                return response()->json(['message'=>"No data available"], 401);
        } catch (\Throwable $th) {
            return response()->json(['message'=>"No data available"], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
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
            'prize' => 'required',
            'is_offer' => 'required',
            'result_time' => 'required'
        ], [
            'name.required' => 'Name is required',
            'tag_line.required' => 'Tag line is required',
            'prize.required' => 'Prize is required',
            'is_offer.required' => 'Is offer is required',
            'result_time.required' => 'Result time is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
            
        try {
            $input = $request->all();
            $gameMaster = new GameMaster($request->toArray());
            $gameMaster->save();
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
    public function show(GameMaster $gameMaster)
    {
        try {
            return response()->json($gameMaster, 200);
        } catch (\Throwable $th) {
            $message = "data not found!";
            return response()->json(['message'=>$message], 401);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameMaster  $gameMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(GameMaster $gameMaster)
    {
        //
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
