@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Pessoas</h2>

    <!-- Botão para abrir o modal -->
    <a href="#" 
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 open-modal"
        data-url="{{ route('people.create') }}">
        Cadastrar Pessoa
    </a>

    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->cpf }}</td>
                    <td>
                        <a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta pessoa?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal de criação de pessoa -->
<div id="peopleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-gray-900 text-white rounded-lg p-6 w-full max-w-lg relative">
        <h2 class="text-xl font-semibold mb-4">Cadastrar Pessoa</h2>

        <form action="{{ route('people.store') }}" method="POST" class="space-y-4" id="peopleCreateForm">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Nome</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2 bg-gray-800 text-white" required>
            </div>

            <div>
                <label for="cpf" class="block text-sm font-medium">CPF</label>
                <input type="text" name="cpf" id="cpf" class="w-full border rounded p-2 bg-gray-800 text-white" required>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium">Função</label>
                <input type="text" name="role" id="role" class="w-full border rounded p-2 bg-gray-800 text-white">
            </div>

            <div class="flex justify-end">
                <button type="button" onclick="closePeopleModal()" class="mr-2 px-4 py-2 bg-gray-600 rounded hover:bg-gray-700">Cancelar</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
            </div>
        </form>

        <!-- Botão de fechar modal -->
        <button onclick="closePeopleModal()" class="absolute top-2 right-2 text-white text-xl">&times;</button>
    </div>
</div>
<!-- Scripts do modal -->
<script>
    function openPeopleModal() {
        document.getElementById('peopleModal').classList.remove('hidden');
    }

    function closePeopleModal() {
        document.getElementById('peopleModal').classList.add('hidden');
    }
</script>
@endsection