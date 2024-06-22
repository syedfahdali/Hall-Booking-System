<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Booking.php
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'user_id',
        'price',
        'location',
        // Add any other fields that are mass assignable
    ];
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
