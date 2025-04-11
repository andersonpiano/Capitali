@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Garagens</h1>

    <a href="{{ route('garages.create') }}" class="btn btn-primary mb-3">Nova Garagem</a>

    <div class="table-responsive">
        <table id="garages-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Centro de Distribuição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($garages as $garage)
                    <tr>
                        <td>{{ $garage->name }}</td>
                        <td>{{ $garage->distribution_center }}</td>
                        <td>
                            <a href="{{ route('garages.edit', $garage->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('garages.destroy', $garage->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
        $('#garages-table').DataTable({
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