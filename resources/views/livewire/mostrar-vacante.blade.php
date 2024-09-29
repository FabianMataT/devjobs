<div class="p-10">
    <div class="md-5">
        <h3 class="font-bold text-3lx text-gray-200 my-3">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-200 my-3">Empresa:
                <samp class="normal-case font-normal">{{ $vacante->empresa }}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">último Día para postularse:
                <samp class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">Categoria:
                <samp class="normal-case font-normal">{{ $vacante->categoria->categoria }}</samp>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">Salario:
                <samp class="normal-case font-normal">{{ $vacante->salario->salario }}</samp>
            </p>
        </div>
        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{'Imagen vacante' . $vacante->titulo}}">
            </div>
            <div class="md:col-span-4">
                <h2 class="text-2lx font-bold mb-5 text-gray-200">Descripción del Puesto</h2>
                <p class="text-gray-200"> {{ $vacante->descripcion }} </p>
            </div>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-200 border-dashed p-5 text-center">
            <p>
                ¿Desas aplicar a esta vacante? <a class="fond-bold text-indigo-600" href=" {{route('register')}} ">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/> 
    @endcannot 
</div>
