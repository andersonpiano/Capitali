<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editar Visitante
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl p-6">
                <form action="{{ route('visitantes.update', $visitante->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="nome" value="{{ $visitante->nome }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">CPF</label>
                            <input type="text" name="cpf" value="{{ $visitante->cpf }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Motivo</label>
                            <input type="text" name="motivo" value="{{ $visitante->motivo }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700">Setor</label>
                            <input type="text" name="setor" value="{{ $visitante->setor }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Responsavel</label>
                            <input type="text" name="responsavel" value="{{ $visitante->responsavel }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Data Visita</label>
                            <input type="date" name="data_visita" value="{{ $visitante->data_visita ? \Carbon\Carbon::parse($visitante->data_visita)->format('Y-m-d') : '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo visitante</label>
                            <input type="text" name="tipo" value="{{ $visitante->tipo ? $visitante->tipo : '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                    <div class="mt-6" style="text-align: right;">
                        <button type="submit" class="bg-green-600 text-gray px-4 py-2 rounded hover:bg-green-700">
                            Atualizar
                        </button>
                        <a href="{{ route('visitantes.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>