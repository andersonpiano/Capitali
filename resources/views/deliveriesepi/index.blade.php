@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Entregas de EPI</h1>

    <div class="bg-gray-800 shadow rounded-lg p-4 overflow-x-auto">
        <table id="deliveriesepi-table" class="min-w-full text-sm text-left">
            <thead>
                <tr class="text-xs uppercase text-gray-300 bg-gray-700">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Pessoa</th>
                    <th class="px-4 py-2">Equipamento</th>
                    <th class="px-4 py-2">Data de Entrega</th>
                    <th class="px-4 py-2">Validade</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveriesepi as $delivery)
                    <tr class="border-b border-gray-700">
                        <td class="px-4 py-2">{{ $delivery->id }}</td>
                        <td class="px-4 py-2">{{ $delivery->person->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $delivery->equipment->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($delivery->delivery_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($delivery->expiration_at)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('deliveriesepi.edit', $delivery->id) }}" class="text-blue-400 hover:underline">Editar</a>
                            <form action="{{ route('deliveriesepi.destroy', $delivery->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('deliveriesepi.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Nova Entrega
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#deliveriesepi-table').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json"
            }
        });
    });
</script>
@endpush