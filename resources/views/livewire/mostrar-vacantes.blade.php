<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante) 
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-lx font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-gray-300 font-bold">{{$vacante->empresa}}</p>
                    <p>Último día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}"
                        class="bg-gray-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{ $vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a href="{{route('vacantes.edit',$vacante->id)}}"
                        class="bg-blue-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})"
                        class="bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-300">No hay vacantes publicadas</p>
        @endforelse
    </div>

    <div class="my-10">
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "Una vacante eliminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {  
                    //Eliminar la vacante
                    Livewire.dispatch('eliminarVacante', {vacante: vacanteId});
                    Swal.fire({
                        title: "Eliminada!",
                        text: "La vacante ha sido eliminada.",
                        icon: "success"
                    });
                }
            });
        })
    </script>

@endpush

