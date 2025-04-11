@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Registrar Entrega de EPI</h1>

    <form action="{{ route('deliveriesepi.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="person_id" class="block text-sm font-medium">Pessoa</label>
            <select name="person_id" id="person_id" class="w-full border rounded p-2" required>
                <option value="">Selecione uma pessoa</option>
                @foreach ($people as $person)
                    <option value="{{ $person->id }}">{{ $person->name }} — {{ $person->role }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="equipment_id" class="block text-sm font-medium">Equipamento</label>
            <select name="equipment_id" id="equipment_id" class="w-full border rounded p-2" required>
                <option value="">Selecione um equipamento</option>
                @foreach ($equipments as $equipment)
                    <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="delivered_at" class="block text-sm font-medium">Data da Entrega</label>
            <input type="date" name="delivered_at" id="delivered_at" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="expiration_at" class="block text-sm font-medium">Validade</label>
            <input type="date" name="expiration_at" id="expiration_at" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar
        </button>
        <a href="{{ route('deliveriesepi.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection