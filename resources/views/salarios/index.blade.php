<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Salarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 6000)" x-show="show">
                    <div id="alert" class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold                    p-2 my-3">
                            {{ session('mensaje') }}
                    </div>
                </div>
            @endif
            <a href="{{route('salarios.create')}}"
                class="bg-blue-500 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase text-center">
                Nuevo salario
            </a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="font-bold text-white p-4 text-center text-xl">Todos los salarios registrados</h1>
                @forelse ($salarios as $salario) 
                    <div class="p-2 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                        <div class="leading-10">
                            <p class="text-lx font-bold">{{$salario->salario}}</p>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-300">No hay salarios preestablecidos</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>