@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 text-white">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Lista de Pessoas</h1>
        <button
            onclick="openCreateModal()"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
        >
            Cadastrar Pessoa
        </button>
    </div>

    <table id="datatable" class="table-auto w-full text-white">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">CPF</th>
                <th class="px-4 py-2">Função</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
                <tr class="border-b border-gray-700">
                    <td class="px-4 py-2">{{ $person->name }}</td>
                    <td class="px-4 py-2">{{ $person->cpf }}</td>
                    <td class="px-4 py-2">{{ $person->role }}</td>
                    <td class="px-4 py-2">
                        <button onclick="openEditModal({{ $person }})"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded mr-2">
                            Editar
                        </button>
                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                type="submit"
                            >
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modal-content')
<form id="personForm" method="POST">
    @csrf
    <input type="hidden" name="_method" id="formMethod" value="POST">
    <input type="hidden" id="person_id" name="person_id">

    <h2 class="text-xl font-bold mb-4" id="modalTitle">Cadastrar Pessoa</h2>

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium">Nome</label>
        <input type="text" name="name" id="name"
            class="w-full border border-gray-600 bg-gray-800 text-white rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="cpf" class="block text-sm font-medium">CPF</label>
        <input type="text" name="cpf" id="cpf"
            class="w-full border border-gray-600 bg-gray-800 text-white rounded p-2" required>
    </div>

    <div class="mb-4">
        <label for="role" class="block text-sm font-medium">Função</label>
        <input type="text" name="role" id="role"
            class="w-full border border-gray-600 bg-gray-800 text-white rounded p-2">
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Salvar
        </button>
    </div>
</form>
@endsection

@section('scripts')
<script>

    function openCreateModal() {
        const form = document.getElementById('personForm');
        form.reset();
        form.action = "{{ route('people.store') }}";
        document.getElementById('formMethod').value = "POST";
        document.getElementById('modalTitle').innerText = "Cadastrar Pessoa";
        openModal();
    }

    function openEditModal(data) {
        const form = document.getElementById('personForm');
        form.action = `/people/${data.id}`;
        document.getElementById('formMethod').value = "PUT";
        document.getElementById('modalTitle').innerText = "Editar Pessoa";

        document.getElementById('name').value = data.name;
        document.getElementById('cpf').value = data.cpf;
        document.getElementById('role').value = data.role;

        openModal();
    }

    $(document).ready(function () {
        $('#datatable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json'
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                background: '#1f2937',
                color: '#fff'
            });
        @endif
    });
</script>
@endsection