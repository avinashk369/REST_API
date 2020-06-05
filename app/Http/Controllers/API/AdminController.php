<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminMaster;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminController extends Controller
{
    /**
     * Admin api end point for admin registration
     */
    public function register(Request $request)
    {
   
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|unique:admin_master',
            'password' => 'required',
        ]);
   
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        try {
            $admin = AdminMaster::create($input);
            $success['token'] =  $admin->createToken('access_token')->accessToken;
            $success['user_name'] =  $admin->user_name;
            $success['is_admin'] =  $admin->is_admin;
            return response()->json($success, 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()], 400);
        }
        
    }

    /**
     * Admin api end point for admin login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
        ]);
   
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }

        $input = $request->all();
        
        $adminMaster = AdminMaster::admin($input['user_name'])->first();
        if(is_null($adminMaster))
        return response()->json(['message'=>'user not found'], 401);
        if(Hash::check($input['password'], $adminMaster->password)){ 
            
            $success['access_token'] =  $adminMaster->createToken('access_token')-> accessToken; 
            $adminMaster->access_token = $success['access_token'];
            $success['mobile'] =  $adminMaster->user_name;
            $success['is_admin'] =  $adminMaster->is_admin;
            return response()->json($success, 200);
        } 
        else{ 
            return response()->json(['message'=>'Invalid credentials'], 401);
        } 
    }
}
