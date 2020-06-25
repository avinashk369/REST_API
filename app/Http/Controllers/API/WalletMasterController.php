<?php

namespace App\Http\Controllers\API;

use App\WalletMaster;
use App\TransactionMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use DB;

class WalletMasterController extends Controller
{

    /**
     * this function will return user wallets details
     * parameter - 
     * user_id
     */
    public function walletDetail($userId){

        try {
            $walletMaster = WalletMaster::where('user_id',$userId)->firstOrFail();
            return response()->json($walletMaster, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()], 401);
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ], [
            'user_id.required' => 'Used id is required',
        ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
        
        //DB transaction
        DB::beginTransaction();
        try {
            $walletMaster = WalletMaster::where('user_id',$request->user_id)->first();
            if(is_null($walletMaster)){
                $request['avl_amount'] = $request['cash_amount'] +$request['promo_amount'];
                $walletMaster = WalletMaster::create($request->all());
            }
            else{
                $walletMaster->cash_amount = $walletMaster->cash_amount + $request->cash_amount;
                $walletMaster->promo_amount = $walletMaster->promo_amount + $request->promo_amount;
                $walletMaster->avl_amount = $walletMaster->cash_amount + $walletMaster->promo_amount; 
                $walletMaster->save();
            }

            
            // make another entry into the transaction table as well
            try {
                $transactionMaster = new TransactionMaster();
                $transactionMaster->user_id = $walletMaster->user_id;
                $transactionMaster->t_amount = $request->cash_amount;
                $transactionMaster->is_credit = 1;
                $transactionMaster->is_debit = 0;
                $transactionMaster->save();
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
                return response()->json(['message'=>$th->getMessage()], 401);
            }
            
            DB::commit();
            return response()->json($walletMaster, 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>$th->getMessage()], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WalletMaster  $walletMaster
     * @return \Illuminate\Http\Response
     */
    public function show(WalletMaster $walletMaster)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WalletMaster  $walletMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletMaster $walletMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WalletMaster  $walletMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletMaster $walletMaster)
    {
        //
    }
}
