<x-app-layout>

    {{-- Slot de Título da Página --}}
    <x-slot name="title">
        {{ __('Clientes') }}
    </x-slot>

    {{-- Slot de Título --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    {{-- Cabeçalho --}}
    <div class="py-3">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex items-center justify-between text-gray-900 dark:text-gray-100">

                    {{-- Título --}}
                    <span class="text-xl font-semibold">{{ __("Listagem de Clientes") }}</span>

                    {{-- Formulário de Pesquisa e Botões --}}
                    <div class="flex items-center space-x-4 flex-grow justify-center">
                        <form method="GET" action="{{ route('clientes.index') }}" class="flex items-center space-x-4">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Pesquisar..."
                                   class="block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 w-80 text-sm">

                            {{-- Botões de Filtro e Limpar --}}
                            <a href="{{ route('clientes.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Limpar
                            </a>

                            <button
                                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Filtrar
                            </button>
                        </form>
                    </div>

                    {{-- Botão de criação de cliente --}}
                    <a href="{{ route('clientes.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Criar Cliente
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{-- Tabela de Clientes --}}
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Telefone</th>
                    <th scope="col" class="px-6 py-3">CEP</th>
                    <th scope="col" class="px-6 py-3">Endereço</th>
                    <th scope="col" class="px-6 py-3">Cadastrado Em</th>
                    <th scope="col" class="px-6 py-3">Última Atualização</th>
                    <th scope="col" class="px-6 py-3">Ação</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clientes as $cliente)
                    {{--  Caso existam clientes, a lista será exibida --}}
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $cliente->id }}</th>
                        <td class="px-6 py-4">{{ $cliente->name }}</td>
                        <td class="px-6 py-4">{{ $cliente->email }}</td>
                        <td class="px-6 py-4">{{ $cliente->telephone }}</td>
                        <td class="px-6 py-4">{{ $cliente->zip_code }}</td>
                        <td class="px-6 py-4">{{ $cliente->address }}</td>
                        <td class="px-6 py-4">{{ $cliente->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $cliente->updated_at->format('d/m/Y H:i') }}</td>

                        {{-- Botão de Detalhes --}}
                        <td class="px-6 py-4">
                            <button type="button" onclick="openModal({{ $cliente }})"
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold px-2 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">
                                Detalhes
                            </button>
                        </td>

                    {{-- Caso a lista esteja vazia, exibe a mensagem --}}
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Paginação --}}
    <div class="py-3 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            {{ $clientes->links() }}
        </div>
    </div>

    {{-- Modal de Detalhes --}}
    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div
                    class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-2xl sm:w-full">
                <div class="bg-white dark:bg-gray-800 p-6 text-gray-900 dark:text-gray-100">
                    <h3 id="modal-name" class="text-lg font-medium"></h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Email: <span id="modal-email"></span></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Email: <span id="modal-telephone"></span></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Email: <span id="modal-zip_code"></span></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Email: <span id="modal-address"></span></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Criado em: <span
                                id="modal-created_at"></span></p>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Última Atualização: <span
                                id="modal-updated_at"></span></p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 flex justify-end space-x-3">

                    {{-- Botões de Editar --}}
                    <a id="editButton"
                       class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base font-medium text-white shadow-sm hover:bg-blue-700 sm:text-sm">
                        Editar
                    </a>

                    {{-- Botão de Fechar --}}
                    <button id="closeModalButton"
                            class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-gray-600 text-base font-medium text-white shadow-sm hover:bg-gray-700 sm:text-sm">
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script para abrir e fechar o modal --}}
    <script>
        function openModal(cliente) {
            {{-- Ajustando os valores do modal --}}
            document.getElementById('modal-name').innerText = cliente.name;
            document.getElementById('modal-email').innerText = cliente.email;
            document.getElementById('modal-telephone').innerText = cliente.telephone;
            document.getElementById('modal-zip_code').innerText = cliente.zip_code;
            document.getElementById('modal-address').innerText = cliente.address;

            {{-- Ajustando os valores de data --}}
            document.getElementById('modal-created_at').innerText = new Date(cliente.created_at).toLocaleString('pt-BR');
            document.getElementById('modal-updated_at').innerText = new Date(cliente.updated_at).toLocaleString('pt-BR');

            {{-- Ajustando o link de edição --}}
            document.getElementById('editButton').href = `/clientes/${cliente.id}/edit`;

            {{-- Exibindo o modal --}}
            document.getElementById('modal').classList.remove('hidden');

            {{-- Fechando o modal --}}
            document.getElementById('closeModalButton').addEventListener('click', function () {
                document.getElementById('modal').classList.add('hidden');
            });
        }
    </script>

</x-app-layout>
