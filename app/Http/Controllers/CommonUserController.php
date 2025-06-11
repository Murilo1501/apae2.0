<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationPostRequest;
use App\Models\UserModel;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;


class CommonUserController extends Controller
{

   public function index(int $id){
        $user = UserModel::where('id',$id)->where('role','comon')->first();

         
        if($user == null)
        {
            return response()->json([
                "message" => "user not found"
            ],404);
        }

        
        return response()->json([
            "User Data" => $user
        ]);
        
   }

   public function store( ValidationPostRequest $request ){ 
       $request['password'] = Hash::make($request['password']);
        
       $user =  UserModel::create($request->all());
        return response()->json([
            "message:" => "user registered succesfully",
            "userData:" => $user   
        ]);
   }

   public function update(){
    
   }

   public function destroy(){

   }
}
