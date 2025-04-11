@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Editar Equipamento</h2>

    <form method="POST" action="{{ route('equipments.update', $equipment) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block">Nome</label>
            <input type="text" name="name" value="{{ $equipment->name }}" class="border rounded w-full px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
    </form>
</div>
@endsection