<?php

namespace App\Http\Controllers\API;

use App\WinnerMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WinnerMasterController extends Controller
{

    /**
     * Return result of particular game
     *
     * @return \Illuminate\Http\Response
     */
    public function gameResult($userId)
    {
        try {
            $winnerMaster = WinnerMaster::where('user_id',$userId)
            ->with('usergames.games')
            ->get();
            if($winnerMaster!=null)
                return response()->json($winnerMaster, 200);
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
     * @param  \App\WinnerMaster  $winnerMaster
     * @return \Illuminate\Http\Response
     */
    public function show(WinnerMaster $winnerMaster)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WinnerMaster  $winnerMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WinnerMaster $winnerMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WinnerMaster  $winnerMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(WinnerMaster $winnerMaster)
    {
        //
    }
}
