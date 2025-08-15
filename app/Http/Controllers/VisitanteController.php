<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::latest()->get();
        return view('visitantes.index', compact('visitantes'));
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14', // formato XXX.XXX.XXX-XX
            'tipo' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
            'setor' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'data_visita' => 'required|date',
        ]);

        Visitante::create($data);

        return redirect()->route('visitantes.index')->with('success', 'Visitante registradado com sucesso!');
    }

    public function edit(Visitante $visitante)
    {
        return view('visitantes.edit', compact('visitante'));
    }

    public function update(Request $request, Visitante $visitante)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14', // formato XXX.XXX.XXX-XX
            'tipo' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
            'setor' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'data_visita' => 'required|date',
        ]);

        $visitante->update($data);

        return redirect()->route('visitantes.index')->with('success', 'Visita atualizada com sucesso!');
    }

    public function destroy(Visitante $visitante)
    {
        $visitante->delete();
        return redirect()->route('visitantes.index')->with('success', 'Registro removido com sucesso!');
    }
}