<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Guard;

class auidtor extends Authenticatable
{
    use HasFactory;


    protected $guarded = [];
    protected $guard = 'auidtor';
}
