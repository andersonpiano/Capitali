<div>
    <h1 class="text-2xl font-bold mb-4">Cadastrar Pessoa</h1>

    <form action="{{ route('people.store') }}" method="POST" class="space-y-4">
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

        <div class="flex justify-end gap-2">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Salvar
            </button>
            <button type="button" id="modal-close-inside" class="text-gray-400 hover:text-white">Cancelar</button>
        </div>
    </form>
</div>