<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class UserModel extends Authenticatable
{   
    use HasApiTokens;

    protected $fillable = ['name','email','password','zipCode','cpf','birthDate','address','phone','role','status'];
    protected $table = 'users';
}
