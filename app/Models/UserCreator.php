<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCreator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'peserta';

    // hidden
    protected $hidden = [
        'password',
        'password_raw',
    ];

    // fillable
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_raw',
        'whatsapp',
        'address',
        'profile'
    ];
}
