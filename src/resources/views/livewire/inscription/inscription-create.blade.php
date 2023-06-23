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
            <a href="{{route('inscriptions')}}" class="text-yellow-600 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Inscrições
            </a>
            <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="#" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">
                Cadastrar uma nova inscrição
            </a>
        </nav>
    </x-slot>

    <div class="max-w-7xl mx-auto py-2 sm:px-6 ">

        <div class="px-4 py-6 sm:px-0">
            <div class="px-6">


                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-9">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Cadastrar uma nova inscrição
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Nesta área você pode cadastrar uma nova inscrição no sistema.
                        </p>
                    </div>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-700">
                                    <p class="font-bold">Formulário</p>
                                    <p class="text-sm text-gray-600">Preencha os dados da inscrição.</p>
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
                                                    <label for="classroom_id" class="sr-only">Escolha a classe</label>
                                                    <select wire:model="classroom_id" id="classroom_id" name="classroom_id"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md   focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option><span class="text-gray-100">Escolha a classe</span></option>
                                                        @foreach ($classrooms as $classroom)
                                                            <option value="{{$classroom->id}}" selected>{{$classroom->name}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                    @error('classroom_id') <span class="error text-red-700">{{ $message
                                                        }}</span> @enderror
                                                </div>
                                                <div>
                                                    <label for="coffeebreak_id" class="sr-only">Coffeebreak</label>
                                                    <select wire:model="coffeebreak_id" id="coffeebreak_id" name="coffeebreak_id"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option><span class="text-gray-100">Escolha o espaço de coffeebreak</span></option>
                                                        @foreach ($coffeebreaks as $coffeebreak)
                                                            <option value="{{$coffeebreak->id}}" selected>{{$coffeebreak->name}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                    @error('coffeebreak_id') <span class="error text-red-700">{{ $message
                                                        }}</span> @enderror
                                                </div>
                                                <div>
                                                    <label for="customer_id" class="sr-only">Escolha a pessoa</label>
                                                    <select wire:model="customer_id" id="customer_id" name="customer_id"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option><span class="text-gray-100">Escolha a pessoa</span></option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{$customer->id}}" selected>{{$customer->name}} {{$customer->surname}}</option>
                                                        @endforeach                                                        
                                                    </select>
                                                    @error('customer_id') <span class="error text-red-700">{{ $message
                                                        }}</span> @enderror
                                                </div>
                                                <div>
                                                    <label for="status" class="sr-only">Status</label>
                                                    <select wire:model="status" id="status" name="status"
                                                        class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md   focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 focus:z-10 sm:text-sm">
                                                        <option><span class="text-gray-100">Status</span></option>
                                                        <option value="Confirmada" selected>Confirmada</option>
                                                        <option value="Cancelada">Cancelada</option>
                                                    </select>
                                                    @error('status') <span class="error text-red-700">{{ $message
                                                        }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button wire:click="create()"
                                                        type="submit"
                                                        class="group relative w-auto flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    Cadastrar
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


