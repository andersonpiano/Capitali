<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $fillable = [
        'name',
        'cpf',
        'role',
    ];
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'role' => 'required|string|max:255',
        ]);
    
        Person::create($validated);
    
        return redirect()->route('people.index')->with('success', 'Pessoa cadastrada com sucesso.');
    }

    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf'  => 'required|string|max:14|unique:people,cpf,' . $person->id,
        ]);

        $person->update($request->only(['name', 'cpf']));

        return redirect()->route('people.index')->with('success', 'Pessoa atualizada com sucesso.');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('people.index')->with('success', 'Pessoa removida com sucesso.');
    }
}