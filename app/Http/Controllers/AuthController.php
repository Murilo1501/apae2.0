<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\ValidationAuthRequest;


class AuthController extends Controller
{

    public function login(ValidationAuthRequest $request)
    {
      $userData = $request->all();
      
      if(Auth::attempt($userData)){
        $user = UserModel::where('email',$userData['email'])->first();

        $token = $this->generateToken($user);
        

        return response()->json([
          'token:'=> $token
        ],200);
      }

      return response()->json([
        'invalid credentials'
      ]);

    }

    public function logout(Request $request)
    {
      $token = $request->bearerToken();

      if(!$token)
      {
          return response()->json([
            'token not declared'
        ],400);
      }

      $access_token = PersonalAccessToken::findToken($token);

       if(!$access_token)
      {
          return response()->json([
            'invalid token'
        ],400);
      }
      
      $access_token->delete();

      return response()->json(['logout succesfully'],200);
    }

    private function generateToken($user)
    {
      return  $user->createToken('api-token')->plainTextToken;
    }

}
