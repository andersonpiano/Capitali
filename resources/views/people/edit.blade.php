@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Pessoa</h2>

    <form action="{{ route('people.update', $person->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $person->name) }}">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" required value="{{ old('cpf', $person->cpf) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('people.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection