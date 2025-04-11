@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Entrega de EPI</h1>

    <form action="{{ route('deliveriesepi.update', $delivery) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pessoa</label>
            <select name="person_id" class="form-control" required>
                @foreach ($people as $person)
                    <option value="{{ $person->id }}" {{ $delivery->person_id == $person->id ? 'selected' : '' }}>
                        {{ $person->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Equipamento</label>
            <select name="equipment_id" class="form-control" required>
                @foreach ($equipments as $equipment)
                    <option value="{{ $equipment->id }}" {{ $delivery->equipment_id == $equipment->id ? 'selected' : '' }}>
                        {{ $equipment->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Data de Entrega</label>
            <input type="date" name="delivered_at" class="form-control" value="{{ $delivery->delivered_at }}" required>
        </div>

        <div class="mb-3">
            <label>Data de Validade</label>
            <input type="date" name="valid_until" class="form-control" value="{{ $delivery->valid_until }}" required>
        </div>

        <button class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection