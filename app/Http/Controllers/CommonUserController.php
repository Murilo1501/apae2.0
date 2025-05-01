<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\CommonUserModel;

class CommonUserController extends Controller
{

    protected $model;

    function __construct(){
        $this->model = new CommonUserModel();
    }

   public function index(){
    
   }

   public function store( StorePostRequest $request ){ 
 
        $this->model->fill($request->all());
        $this->model->save();
        return response()->json([
            "message:" => "user registered succesfully"
        ]);
   }

   public function update(){

   }

   public function destroy(){

   }
}
