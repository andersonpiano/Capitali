<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Garage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::with('garage')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $garages = Garage::all();
        return view('vehicles.create', compact('garages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required|string|max:20',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
            'mileage' => 'required|numeric',
            'status' => 'required|string',
            'garage_id' => 'required|exists:garages,id',
        ]);
    
        Vehicle::create($request->all());
    
        return redirect()->route('vehicles.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $garages = \App\Models\Garage::all();
        return view('vehicles.edit', compact('vehicle', 'garages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'plate' => 'required|string|max:20',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
            'mileage' => 'required|numeric',
            'status' => 'required|string',
            'garage_id' => 'required|exists:garages,id',
        ]);
    
        $vehicle->update($request->all());
    
        return redirect()->route('vehicles.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Veículo excluído com sucesso!');
    }
}
