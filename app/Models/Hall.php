<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'capacity',
        'location',
        'price',
        'availability',
        'image',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // Relationship with Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Relationship with CustomerCare
    public function customerCares()
    {
        return $this->hasMany(CustomerCare::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/halls/' . $this->image);
    }
}
