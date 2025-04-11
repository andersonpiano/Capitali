<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garage;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $fillable = ['name', 'location'];

    public function index()
    {
        $garages = Garage::all();
        return view('garages.index', compact('garages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('garages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
            ]);

        Garage::create($request->only('name', 'location'));

        return redirect()->route('garages.index')->with('success', 'Garagem criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicles = $garage->vehicles;
        return view('garages.show', compact('garage', 'vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('garages.edit', compact('garage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garage $garage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
    
        $garage->update($request->all());
    
        return redirect()->route('garages.index')->with('success', 'Garagem atualizada com sucesso!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garage $garage)
    {
        $garage->delete();
        return redirect()->route('garages.index')->with('success', 'Garagem excluída com sucesso!');
    }
}
