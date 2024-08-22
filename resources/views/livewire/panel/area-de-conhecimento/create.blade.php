<div class="flex flex-col items-center justify-center gap-8">
    <div class="flex w-4/5 items-center justify-between">
        <h2 class="text-3xl font-bold">Nova Área de Conhecimento</h2>
        <div class="flex items-center justify-between gap-5">

        </div>
    </div>
    <div class="w-4/5 rounded-lg pt-3 shadow shadow-[#ffb966]">
        <div class="col-span-10 mb-10 px-10 py-4">

            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4">
                    <label for="first_name" class="mb-2 block text-sm font-medium text-gray-700">Nome da Área de
                        Conhecimento</label>
                    <input type="text" id="first_name" wire:model="name"
                        class="block w-full rounded-lg border border-[#ffb966] bg-gray-50 p-2.5 text-sm text-gray-700 shadow-[#ffb966] focus:border-[#ffb966] focus:ring-[#ffb966]"
                        required />
                </div>

                <div class="col-span-4">
                    <label for="countries" class="text-md mb-2 block font-medium text-gray-700">Curso</label>
                    <select id="countries" wire:model="curso" value="0"
                        class="block w-full rounded-lg border-none bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm shadow-[#ffb966] focus:border focus:border-[#ffb966] focus:ring-[#ffb966]">
                        <option value="0" selected disabled>Selecione um Curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-4">
                    <x-color picker wire:model="color" />
                </div>


                <div class="col-span-4">
                    <button wire:click.prevent="store"
                        class="mt-4 w-full rounded-lg border-2 border-green-500 px-5 py-2 text-sm font-semibold uppercase text-green-600 transition-all duration-100 ease-linear hover:bg-green-200">
                        Criar Área de Conhecimento
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
