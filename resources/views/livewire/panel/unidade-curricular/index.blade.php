<div class="flex flex-col gap-8 items-center justify-center">

    @session('success')
        <div id="message" class="absolute left-0 top-0 w-full py-2 text-center bg-green-400 text-neutral-50">

            <div class="relative w-full text-center">
                {{ session('success') }}
                <div class="absolute py-1 bg-green-700 w-full bar -bottom-3"></div>
            </div>

        </div>
    @endsession

    @session('error')
        <div id="message" class="absolute left-0 top-0 w-full py-2 text-center bg-red-400 text-neutral-50">
            <div class="relative w-full text-center">
                {{ session('error') }}
                <div class="absolute py-1 bg-red-700 w-full bar -bottom-3"></div>
            </div>
        </div>
    @endsession


    <div class="w-4/5 flex justify-between items-center">
        <h2 class="font-bold text-3xl">Unidades Curriculares</h2>
        <div class="flex items-center justify-between gap-5">
            <a href="{{ route('ucs.create') }}" wire:navigate
                class="w-full text-sm px-5 font-semibold uppercase text-green-600 hover:bg-green-200 border-2 border-green-500 rounded-lg py-2 transition-all duration-100 ease-linear">
                Adicionar Unidade Curricular
            </a>
        </div>
    </div>
    <div class="shadow shadow-[#ffb966] w-4/5 py-3 rounded-lg">
        <div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ucs as $index => $uc)
                        <tr class="text-center border-y hover:bg-neutral-100 transition-all duration-100 ease-linear "
                            wire:key="{{ $uc->id }}">

                            <td class="py-3">
                                {{ $uc->id }}
                            </td>

                            <td class="py-3">
                                {{ $uc->name }}
                            </td>

                            <td class="py-3">
                                {{ $uc->duration }} Horas
                            </td>

                            <td class="py-3 min-w-24">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="checkbox-{{ $uc->id }}" class="sr-only peer"
                                        name="{{ $uc->id }}" wire:click='toggleStatus({{ $uc->id }})'
                                        {{ $uc->status ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#ff8b0066] rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#ff8b00]">
                                    </div>
                                    <div wire:loading wire:target='toggleStatus({{ $uc->id }})'
                                        class="border-gray-300 h-6 w-6 ms-2 animate-spin rounded-full border-2 border-t-[#ff8b00]">
                                    </div>

                                </label>
                            </td>

                            <td class="py-3">
                                {{ $uc->created_at->format('d/m/Y') }}
                            </td>

                            <td class="py-3">
                                <div class="flex justify-center items-center gap-2">
                                    <div x-data="{ edit: false }" x-on:click="edit = true"
                                        wire:click="getUC({{ $uc->id }})"
                                        class="text-sm cursor-pointer select-none px-5 font-semibold uppercase text-yellow-600 hover:bg-yellow-200 border-2 border-yellow-500 rounded-lg py-2 transition-all duration-100 ease-linear">
                                        Editar

                                        <div x-show="edit"
                                            class="absolute inset-0 z-10 cursor-pointer bg-neutral-600 w-screen h-screen bg-opacity-30  flex items-center justify-center">

                                            <div class="bg-white min-w-[40%] min-h-[70%] p-5 shadow-lg rounded-lg cursor-default"
                                                x-on:click.away="edit = false">

                                                <h2 class="font-bold text-neutral-700 text-2xl mb-10">Editar UC -
                                                    {{ $uc->name }}
                                                </h2>

                                                <div class="grid grid-cols-4 gap-4">
                                                    <div class="col-span-4">
                                                        <label for="first_name"
                                                            class="block mb-2 text-sm font-medium text-gray-700">Nome da
                                                            UC</label>
                                                        <input type="text" id="first_name" wire:model="name"
                                                            class="bg-gray-50 border border-[#ffb966] text-gray-700 shadow-[#ffb966] text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966]  block w-full p-2.5"
                                                            required />
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="first_name"
                                                            class="block mb-2 text-sm font-medium text-gray-700">Descrição
                                                            da UC</label>
                                                        <textarea type="text" id="first_name" wire:model="description"
                                                            class="bg-gray-50 border border-[#ffb966] text-gray-700 shadow-[#ffb966] text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966]  block w-full p-2.5"
                                                            required></textarea>
                                                    </div>

                                                    <div class="col-span-4">
                                                        <label for="first_name"
                                                            class="block mb-2 text-sm font-medium text-gray-700">
                                                            Carga Horária
                                                        </label>
                                                        <input type="number" id="first_name" wire:model="duration"
                                                            class="bg-gray-50 border border-[#ffb966] text-gray-700 shadow-[#ffb966] text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966]  block w-full p-2.5"
                                                            required />
                                                    </div>

                                                    <div class="col-span-4">
                                                        <label for="countries"
                                                            class="block mb-2 text-md font-medium text-gray-700">Curso</label>
                                                        <select id="countries" wire:model="curso_id" value="0"
                                                            class="bg-gray-50 border-none focus:border shadow-sm shadow-[#ffb966] text-gray-900 text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966] block w-full p-2.5 ">
                                                            <option value="0" selected disabled>Selecione um Curso
                                                            </option>
                                                            @if ($cursos)
                                                                @foreach ($cursos as $curso)
                                                                    <option value="{{ $curso->id }}">
                                                                        {{ $curso->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-span-4">
                                                        <button wire:click.prevent="update({{ $uc->id }})"
                                                            class="w-full text-sm px-5 font-semibold uppercase text-green-600 hover:bg-green-200 border-2 border-green-500 rounded-lg mt-4 py-2 transition-all duration-100 ease-linear">
                                                            Editar UC
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button wire:click.prevent="delete({{ $uc->id }})"
                                        class="text-sm px-5 font-semibold uppercase text-red-600 hover:bg-red-200 border-2 border-red-500 rounded-lg py-2 transition-all duration-100 ease-linear">
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
</div>
