@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Equipamentos de EPI</h1>

    <a href="{{ route('equipments.create') }}" class="btn btn-primary mb-3">Novo Equipamento</a>

    <div class="table-responsive">
        <table id="equipments-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->description }}</td>
                        <td>
                            <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#equipments-table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>
@endpush
@endsection