<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $dates = ['created_at', 'updated_at','email_verified_at'];
    // Or alternatively
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
