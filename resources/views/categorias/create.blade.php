<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nueva Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-10">Nuevo salario</h1>
                    <div class="md:flex md:justify-center p-5">
                        <form class="md:w-1/2 space-y-5" action="{{route('categorias.store')}}" method="POST" novalidate>
                        @csrf
                            <div>
                                <label for="categoria" class="mb-2 block text-gray-300 font-bold">
                                    Categoria: 
                                </label>
                                <input 
                                    id="categoria"
                                    name="categoria"
                                    type="categoria"
                                    placeholder="Back end Dev"
                                    class="border p-3 w-full rounded-lg text-gray-900
                                    @error('categoria') border-red-500 @enderror"
                                    value="{{old('categoria')}}"
                                />
                                @error('categoria')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                                @enderror
                           </div>
                           <x-primary-button>
                            Crear Categoria
                           </x-primary-button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


