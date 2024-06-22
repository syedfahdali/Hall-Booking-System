<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;

class DashboardController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('dashboard', compact('halls'));
    }
}
