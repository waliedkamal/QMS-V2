<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
USE APP\Models\department;



class employee extends Authenticatable
{

    use HasFactory;

    protected $guarded = [];
    protected $guard = 'employee';

     protected $fillable = [
        'email', 'password',
         'name', 'birth_date', 'company',

        'Joining_Date'

     ];




   public function username()
   {
      return 'email';
   }

   public function getAuthIdentifier()
   {
      return $this->getKey();
   }

   protected $hidden = [
      'password',

   ];
     
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




}
