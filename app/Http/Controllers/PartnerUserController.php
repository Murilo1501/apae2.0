<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidationPostRequest;

class PartnerUserController extends Controller
{
    public function index($id)
    {
        $user = UserModel::where('id',$id)->where('role','partner')->first();

        if($user == null){
            return response()->json("user not found");
        }

        return response()->json([
            "user data:"=> $user 
        ],200);
    }

    public function store(ValidationPostRequest $request)
    {
        $data = $request->all();
        
        $data['password'] = Hash::make($data['password']);
        $user = UserModel::create($data);

        if(!$user)
        {
            return response()->json([
                "message:"=> "store fail"
            ],201);
        }

        return response()->json([
            "message:"=> "partner user registered succesfully"
        ],201);

        
    }
}
