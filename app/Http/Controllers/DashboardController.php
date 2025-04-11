<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garage;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    
public function index()
{
    $garages = Garage::withCount('vehicles')->get();
    $totalGarages = $garages->count();
    $totalVehicles = Vehicle::count();

    return view('dashboard', compact('garages', 'totalGarages', 'totalVehicles'));
}
}
