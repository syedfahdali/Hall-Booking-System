<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Manager extends Model
{
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}