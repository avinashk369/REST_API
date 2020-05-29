<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserMaster;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
   
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:user_master',
            'otp' => 'required',
        ]);
   
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 401);
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['otp']);
        $input['otp'] = bcrypt($input['otp']);
        
        try {
            $user = UserMaster::create($input);
            $success['token'] =  $user->createToken('access_token')->accessToken;
            $success['mobile'] =  $user->mobile;
            return response()->json($success, 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Bad request'], 400);
        }
        
   
        
    }
   
    public function login(Request $request)
    {
        if(Auth::attempt(['mobile' => $request->mobile, 'password' => $request->otp])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('access_token')-> accessToken; 
            $success['mobile'] =  $user->mobile;
   
            return response()->json($success, 200);
        } 
        else{ 
            return response()->json(['message'=>'Invalid credentials'], 401);
        } 
    }

    /* public function logout(Request $request)
        {
            $user = Auth::guard('api')->user();

            if ($user) {
                $user->api_token = null;
                $user->save();
            }

            return response()->json(['data' => 'User logged out.'], 200);
        } */
}
