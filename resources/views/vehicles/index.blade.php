@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Veículos</h1>

    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Novo Veículo</a>

    <div class="table-responsive">
        <table id="vehicles-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Garagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->plate }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->garage->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
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
        $('#vehicles-table').DataTable({
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