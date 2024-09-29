<div class="bg-gray-700 p-5 mt-10 flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4 text-white">Postularme a esta vacante</h3>

    @if (session()->has('message'))
        <div class="border-green-600 bg-green-100 text-green-600 font-bold p-2 my-2 text-center">
            {{session('message')}}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>

            <x-primary-button>
                {{('Postularme')}}
            </x-primary-button>
        </form>
    @endif
</div>
