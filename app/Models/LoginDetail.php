<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginDetail extends Model
{
    use HasFactory;
    protected $table='logindetail';
    protected $fillable=[
       'email','lastlogindate'
    ];
}
