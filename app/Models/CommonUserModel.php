<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonUserModel extends Model
{   
    protected $fillable = ['name','email','password','zipCode','cpf','birthDate','address','phone','role','status'];
    protected $table = 'users';
}
