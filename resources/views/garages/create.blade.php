@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Garagem</h1>

    <form action="{{ route('garages.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Nome</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium">Localização</label>
            <input type="text" name="location" id="location" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar
        </button>
        <a href="{{ route('garages.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection