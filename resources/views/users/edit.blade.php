<x-app-layout>

    {{-- Título da Página --}}
    <x-slot name="title">
        {{ __('Edição de usuário') }}
    </x-slot>

    {{-- Cabeçalho da Página --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuário') }}
        </h2>
    </x-slot>

    {{-- Cabeçalho e Botão de Criação --}}
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between items-center text-gray-900 dark:text-gray-100">
                    <span>{{ __("Edição de Usuários") }}</span>

                    {{-- Formulário para deletar --}}
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                          onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                        @csrf
                        @method('DELETE')

                        {{-- Botão Deletar --}}
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                     rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700
                                      focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                       focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Deletar Usuário
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Formulário de Edição de Usuário --}}
                    <form method="POST" action="{{ route('users.update', $user->id) }}"
                          onsubmit="return confirm('Tem certeza que deseja atualizar este usuário?');">
                        @csrf
                        @method('PUT')

                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Perfil do Usuário</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Esta informação será exibida
                                    publicamente, então tenha cuidado com o que compartilha.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                            Nome
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" autocomplete="given-name"
                                                   value="{{ $user->name }}"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                     {{ $errors->has('name') ? 'ring-red-600 focus:ring-red-600' : 'ring-gray-300 focus:ring-indigo-600' }}">
                                            @error('name')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                                            Email
                                        </label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email" autocomplete="email"
                                                   value="{{ $user->email }}"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                     {{ $errors->has('email') ? 'ring-red-600 focus:ring-red-600' : 'ring-gray-300 focus:ring-indigo-600' }}">
                                            @error('email')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                                            Senha
                                        </label>
                                        <div class="mt-2">
                                            <input id="password" name="password" type="password"
                                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                                    placeholder:text-gray-400 sm:text-sm sm:leading-6
                                                     {{ $errors->has('password') ? 'ring-red-600 focus:ring-red-600' : 'ring-gray-300 focus:ring-indigo-600' }}">
                                            @error('password')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <!-- Botão Voltar -->
                                <a href="{{ route('users.index') }}"
                                   class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700">
                                    Voltar
                                </a>

                                <!-- Botão Atualizar -->
                                <button type="submit"
                                        class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white
                                         shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2
                                          focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
