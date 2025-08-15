<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-white leading-tight">
            Visitantes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('visitantes.create') }}" class="btn btn-dark mb-4">Novo Visitante</a>

                <table id="visitantes-table" class="table table-bordered table-striped w-100">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Motivo</th>
                            <th>Setor</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitantes as $visitante)
                            <tr>
                                <td class="text-left">{{ $visitante->nome }}</td>
                                <td>{{ $visitante->cpf }}</td>
                                <td>{{ $visitante->motivo }}</td>
                                <td>{{ $visitante->setor }}</td>
                                <td>{{ \Carbon\Carbon::parse($visitante->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('visitantes.edit', $visitante->id) }}" class="btn btn-sm btn-dark">Editar</a>
                                    <form action="{{ route('visitantes.destroy', $visitante->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirmDelete(event)">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('styles')
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        

        <script>
            $(document).ready(function () {
                $('#visitantes-table').DataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            text: '<i class="fas fa-file-excel me-2"></i> Excel',
                            className: 'btn btn-dark'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="fas fa-file-pdf me-2"></i> PDF',
                            className: 'btn btn-dark'
                        },
                        {
                            extend: 'print',
                            title: "",
                            text: '<i class="fas fa-print me-2"></i> Imprimir',
                            className: 'btn btn-dark',
                            customize: function (win) {
                            // Adiciona cabeçalho personalizado
                            $(win.document.body).prepend(
                                '<div style="text-align:center;margin-bottom:20px;">' +
                                '<h2>Relatório de Visitantes</h2>' +
                                '<p>Gerado em: ' + new Date().toLocaleDateString() + '</p>' +
                                '</div>'
                            );

                            // Adiciona rodapé personalizado
                            $(win.document.body).append(
                                '<div style="text-align:center;margin-top:20px;">' +
                                '<hr>' +
                                '<p>Sistema de Controle de Visitantes - ' + 
                                '© ' + new Date().getFullYear() + ' ' + 
                                window.location.hostname + '</p>' +
                                '</div>'
                            );

                            // Estilização adicional
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="fas fa-copy me-2"></i> Copiar',
                            className: 'btn btn-dark'
                        },
                        {
                            extend: 'csv',
                            text: '<i class="fas fa-file-csv me-2"></i> CSV',
                            className: 'btn btn-dark'
                        },
                        
                    ],
                    language: {
                        search: "Pesquisar:",
                        lengthMenu: "Mostrar _MENU_ registros por página",
                        zeroRecords: "Nenhum registro encontrado",
                        info: "Mostrando página _PAGE_ de _PAGES_",
                        infoEmpty: "Nenhum registro disponível",
                        infoFiltered: "(filtrado de _MAX_ registros no total)",
                        url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                    },
                    columnDefs: [
                        {
                            targets: -1, // Última coluna (índice -1)
                            orderable: false // Desativa ordenação
                        }
                    ]
                });
            });

            function confirmDelete(event) {
                event.preventDefault();
                const form = event.target.closest('form');
                
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>