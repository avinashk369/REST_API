<?php

namespace App\Http\Controllers\API;

use App\TransactionMaster;
use App\WithdrawMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;

class WithdrawMasterController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'w_amount' => 'required',
        ], [
            'user_id.required' => 'User id is required',
            'w_amount.required' => 'Withdraw amount is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
        
        //DB transaction
        DB::beginTransaction();
        try {

            $withdrawMaster = WithdrawMaster::create($request->all());

            // make another entry into the transaction table as well
            try {
                $transactionMaster = new TransactionMaster();
                $transactionMaster->user_id = $withdrawMaster->user_id;
                $transactionMaster->t_amount = $withdrawMaster->w_amount;
                $transactionMaster->is_credit = 0;
                $transactionMaster->is_debit = 1;
                $transactionMaster->save();

            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
                return response()->json(['message'=>$th->getMessage()], 401);
            }
            DB::commit();
            return response()->json($withdrawMaster, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            $message = "Could not save request!";
            return response()->json(['message'=>$message], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WithdrawMaster  $withdrawMaster
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawMaster $withdrawMaster)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WithdrawMaster  $withdrawMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawMaster $withdrawMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WithdrawMaster  $withdrawMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawMaster $withdrawMaster)
    {
        //
    }
}
