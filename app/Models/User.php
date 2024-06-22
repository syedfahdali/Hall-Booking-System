<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    /**
     * Get the halls owned by this user.
     */
    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    /**
     * Get the bookings made by this user.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
