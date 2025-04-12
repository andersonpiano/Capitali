<h2 class="text-xl font-bold mb-4">Cadastrar Pessoa</h2>

<form action="{{ route('people.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-white">Nome</label>
        <input type="text" name="name" id="name" class="w-full bg-zinc-800 text-white border border-zinc-700 rounded p-2" required>
    </div>

    <div>
        <label for="cpf" class="block text-sm font-medium text-white">CPF</label>
        <input type="text" name="cpf" id="cpf" class="w-full bg-zinc-800 text-white border border-zinc-700 rounded p-2" required>
    </div>

    <div>
        <label for="role" class="block text-sm font-medium text-white">Função</label>
        <input type="text" name="role" id="role" class="w-full bg-zinc-800 text-white border border-zinc-700 rounded p-2">
    </div>

    <div class="flex justify-end space-x-2 pt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar
        </button>
        <button type="button" onclick="closeModal()" class="text-gray-300 hover:underline">
            Cancelar
        </button>
    </div>
</form>