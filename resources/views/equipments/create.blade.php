@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Novo Equipamento</h2>

    <form method="POST" action="{{ route('equipments.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block">Nome</label>
            <input type="text" name="name" class="border rounded w-full px-3 py-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
    </form>
</div>
@endsection