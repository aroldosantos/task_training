<main x-data>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight rounded">
            {{ __("Classes") }}
        </h2>
        <nav class="flex items-center text-sm font-medium mt-1">
            <a href="{{ route('dashboard') }}" class="text-yellow-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Início
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="{{route('coffeebreaks')}}" class="text-yellow-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Coffeebreaks
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="#" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Criar um novo espaço
            </a>
        </nav>
    </x-slot>

    <div class="max-w-7xl mx-auto py-2 sm:px-6 ">

        <div class="px-4 py-6 sm:px-0">
            <div class="px-6">


                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-9">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Cadastrar um novo espaço para coffeebreak
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Nesta área você pode cadastrar um novo espaço para coffeebreak no sistema.
                        </p>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-700">
                                    <p class="font-bold">Formulário</p>
                                    <p class="text-sm text-gray-600">Preencha os dados do espaço.</p>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                    @if($operation == "create")

                                        @if($msg)
                                        <div x-data="{ show: true }" 
                                                x-show="show" 
                                                x-init="setTimeout(() => show = false, 3000)"
                                                class="message-success bg-green-100 text-green-900 p-2 mb-3"
                                                >
                                                {{$msg}}
                                            </div>
                                        @endif

                                    @endif

                                    <div class="px-0">
                                        <form wire:submit.prevent method="POST">
                                            @csrf
                                            <div class="rounded-md shadow-sm -space-y-px">

                                                <div>
                                                    <label for="name" class="sr-only">Nome do espaço</label>
                                                    <input
                                                        wire:model="name"
                                                        id="name"
                                                        name="name"
                                                        type="text"
                                                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm"
                                                        placeholder="Digite o nome da classe">
                                                    @error('name') <span class="error text-red-700">{{ $message }}</span> @enderror
                                                </div>
                                                <div>
                                                    <label for="capacity" class="sr-only">Lotação</label>
                                                    <input
                                                        wire:model="capacity"
                                                        id="capacity"
                                                        name="capacity"
                                                        type="text"
                                                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm"
                                                        placeholder="Digite a lotação da classe">
                                                    @error('capacity') <span class="error text-red-700">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button wire:click="create()"
                                                        type="submit"
                                                        class="group relative w-auto flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    Criar espaço
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- /End replace -->
    </div>
</main>


