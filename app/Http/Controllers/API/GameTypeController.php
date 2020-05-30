<?php

namespace App\Http\Controllers\API;

use App\GameType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameTypeController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameType  $gameType
     * @return \Illuminate\Http\Response
     */
    public function edit(GameType $gameType)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameType  $gameType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameType $gameType)
    {
        //
    }
}
