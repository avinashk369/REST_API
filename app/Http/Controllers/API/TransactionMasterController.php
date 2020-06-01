<?php

namespace App\Http\Controllers\API;

use App\TransactionMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionMasterController extends Controller
{

    /**
     * Return transaction history
     *
     * @return \Illuminate\Http\Response
     */
    public function history($userId)
    {
        try {
            $transactionMaster = TransactionMaster::where('user_id',$userId)->get();
            if($transactionMaster!=null)
                return response()->json($transactionMaster, 200);
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
     * @param  \App\TransactionMaster  $transactionMaster
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionMaster $transactionMaster)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionMaster  $transactionMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionMaster $transactionMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionMaster  $transactionMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionMaster $transactionMaster)
    {
        //
    }
}
