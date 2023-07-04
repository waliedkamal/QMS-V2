<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use HasFactory;


    protected $guarded = [];
    protected $guarde = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password', 'company', 'Joining_Date'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
