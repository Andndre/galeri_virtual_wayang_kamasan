<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserCreator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'creator';

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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
