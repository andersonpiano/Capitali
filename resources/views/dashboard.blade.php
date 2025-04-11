@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Dashboard de Frota</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold">Total de Garagens</h2>
            <p class="text-3xl font-bold">{{ $totalGarages }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold">Total de Veículos</h2>
            <p class="text-3xl font-bold">{{ $totalVehicles }}</p>
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-4">Garagens e seus veículos</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($garages as $garage)
            <div class="bg-white border rounded-lg shadow p-4">
                <h3 class="text-lg font-bold mb-2">{{ $garage->name }}</h3>
                <p class="mb-2">Localização: {{ $garage->location }}</p>
                <p class="mb-4">Veículos nesta garagem: <strong>{{ $garage->vehicles_count }}</strong></p>
                <a href="{{ route('garages.show', $garage->id) }}" class="text-blue-600 hover:underline">Ver detalhes</a>
            </div>
        @endforeach
    </div>
    @livewire('garage-chart')
</div>

@endsection
