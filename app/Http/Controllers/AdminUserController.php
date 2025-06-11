<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidationPostRequest;

class AdminUserController extends Controller
{
    public function index(int $id)
    {   
        $user = UserModel::where('id',$id)->where('role','admin')->first();
       
        if($user == null)
        {
            return response()->json([
                "message" => "user not found"
            ],404);
        }

        return response()->json([
            "user data:"=> $user
        ],200);
    }

    public function store(ValidationPostRequest $request)
    {
        $request['password'] = Hash::make($request['password']);

        $user = UserModel::create($request->all());

        return response()->json([
            "message" => "admin user registered succesfully"
        ],201);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
