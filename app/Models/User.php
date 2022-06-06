<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = ['firstname', 'lastname', 'email',  'address', 'username', 'password', 'token', 'active'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
