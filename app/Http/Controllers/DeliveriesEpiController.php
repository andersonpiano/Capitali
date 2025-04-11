<?php

namespace App\Http\Controllers;

use App\Models\DeliveriesEpi;
use App\Models\Equipment;
use App\Models\Person;
use Illuminate\Http\Request;

class DeliveriesEpiController extends Controller
{
    public function index()
    {
        $deliveriesepi = DeliveriesEpi::with('person', 'equipment')->get();
        return view('deliveriesepi.index', compact('deliveriesepi'));
    }

    public function create()
    {
        $people = Person::all();
        $equipments = Equipment::all();
        return view('deliveriesepi.create', compact('people', 'equipments'));
    }

    public function store(Request $request)
    {
        DeliveriesEpi::create($request->only([
            'person_id',
            'equipment_id',
            'delivery_date',
            'expiration_date',
        ]));

        return redirect()->route('deliveriesepi.index')->with('success', 'Entrega registrada com sucesso!');
    }

    public function edit(DeliveriesEpi $deliveriesepi)
    {
        $people = Person::all();
        $equipments = Equipment::all();
        return view('deliveriesepi.edit', compact('deliveriesepi', 'people', 'equipments'));
    }

    public function update(Request $request, DeliveriesEpi $deliveriesepi)
    {
        $deliveriesepi->update($request->only([
            'person_id',
            'equipment_id',
            'delivery_date',
            'expiration_date',
        ]));

        return redirect()->route('deliveriesepi.index')->with('success', 'Entrega atualizada com sucesso!');
    }

    public function destroy(DeliveriesEpi $deliveriesepi)
    {
        $deliveriesepi->delete();
        return redirect()->route('deliveriesepi.index')->with('success', 'Entrega deletada com sucesso!');
    }
}