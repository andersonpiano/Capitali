<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Cadastrar Visitante
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
             @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso',
                        text: '{{ session('success') }}',
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>
            @endif

            @if($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            <div class="bg-white shadow-xl rounded-xl p-6">
                <form action="{{ route('visitantes.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="nome" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">CPF</label>
                            <input type="text" name="cpf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Motivo da visita</label>
                            <input type="text" name="motivo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Destino</label>
                            <select name="setor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option>Informe o local da visita</option>
                                <option>Armazém</option>
                                <option>Logistica</option>
                                <option>Administrativo</option>
                                <option>Serviços de obra</option>
                                <option>Serviços gerais</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Responsavel pelo visitante</label>
                            <select name="responsavel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option>Responsavel</option>
                                <option>Jeferson</option>
                                <option>Leon</option>
                                <option>Mario</option>
                                <option>Eva</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Data Visita</label>
                            <input type="date" name="data_visita" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ date('Y-m-d') }}" readonly>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipo de Autorização</label>
                            <select name="tipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option>Informe o tipo da visita</option>
                                <option>Visitante</option>
                                <option>Prestador de Serviços</option>
                            </select>
                        </div>

                    <div class="mt-6" style="text-align: right;">
                        <button type="submit" class="btn btn-dark" onclick="return confirmRegistro(event)">
                            Salvar
                        </button>
                        <a href="{{ route('visitantes.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
            function confirmRegistro(event) {
                event.preventDefault();
                const form = event.target.closest('form');
                
                Swal.fire({
                    title: 'Confirma inclusão?',
                    text: "Todos os dados foram preenchidos corretamente?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>