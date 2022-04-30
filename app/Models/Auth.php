<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    public $table = "auth";
    public $timestamps = true;
    protected $fillable = ['account','token'];

}