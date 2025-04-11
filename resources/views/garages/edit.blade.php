@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Garagem</h1>

    <form action="{{ route('garages.update', $garage) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium">Nome da Garagem</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ $garage->name }}" required>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium">Localização</label>
            <input type="text" name="location" id="location" class="w-full border rounded p-2" value="{{ $garage->location }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Atualizar
        </button>
        <a href="{{ route('garages.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection