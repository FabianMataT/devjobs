<div class="bg-gray-900 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-200 text-center font-extrabold my-5">Buscar y Filtrar Vacantes</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-200 uppercase font-bold "
                        for="termino">Término de Búsqueda
                    </label>
                    <input 
                        id="termino"
                        type="text"
                        placeholder="Buscar por Término: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="termino"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-200 uppercase font-bold">Categoría</label>
                    <select wire:model="categoria" class="border-gray-300 p-2 w-full">
                        <option>--Seleccione--</option>
            
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-200 uppercase font-bold">Salario Mensual</label>
                    <select wire:model="salario" class="border-gray-300 p-2 w-full">
                        <option>-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-center sm:justify-start">
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>
