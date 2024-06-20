<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Hall.php
class Hall extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function customerCares()
    {
        return $this->hasMany(CustomerCare::class);
    }
}
