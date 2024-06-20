<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Employee.php
class Employee extends Model
{
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function customerCares()
    {
        return $this->hasMany(CustomerCare::class);
    }
}
