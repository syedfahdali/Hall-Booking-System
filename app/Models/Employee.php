<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['hall_id', 'manager_id', 'name', 'shift', 'phone'];

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

