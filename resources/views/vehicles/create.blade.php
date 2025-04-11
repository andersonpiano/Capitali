@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Veículo</h1>

    <form action="{{ route('vehicles.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="plate" class="block text-sm font-medium">Placa</label>
            <input type="text" name="plate" id="plate" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="model" class="block text-sm font-medium">Modelo</label>
            <input type="text" name="model" id="model" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="brand" class="block text-sm font-medium">Marca</label>
            <input type="text" name="brand" id="brand" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="year" class="block text-sm font-medium">Ano</label>
            <input type="number" name="year" id="year" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="mileage" class="block text-sm font-medium">Quilometragem</label>
            <input type="number" name="mileage" id="mileage" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <select name="status" id="status" class="w-full border rounded p-2" required>
                <option value="">Selecione</option>
                <option value="ativo">Ativo</option>
                <option value="em manutenção">Em manutenção</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>

        <div>
            <label for="garage_id" class="block text-sm font-medium">Garagem</label>
            <select name="garage_id" id="garage_id" class="w-full border rounded p-2" required>
                <option value="">Selecione uma garagem</option>
                @foreach ($garages as $garage)
                    <option value="{{ $garage->id }}">{{ $garage->name }} — {{ $garage->location }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar
        </button>
        <a href="{{ route('vehicles.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection