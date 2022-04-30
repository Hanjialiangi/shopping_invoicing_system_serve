<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    public $table = "admin_info";
    public $timestamps = false;
    protected $fillable = ['account','password','is_stop'];

}