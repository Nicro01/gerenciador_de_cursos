<div class="flex flex-col items-center justify-center gap-8">

    @session('success')
        <div id="message" class="absolute left-0 top-0 w-full bg-green-400 py-2 text-center text-neutral-50">

            <div class="relative w-full text-center">
                {{ session('success') }}
                <div class="bar absolute -bottom-3 w-full bg-green-700 py-1"></div>
            </div>

        </div>
    @endsession

    @session('error')
        <div id="message" class="absolute left-0 top-0 w-full bg-red-400 py-2 text-center text-neutral-50">
            <div class="relative w-full text-center">
                {{ session('error') }}
                <div class="bar absolute -bottom-3 w-full bg-red-700 py-1"></div>
            </div>
        </div>
    @endsession

    <div class="flex w-4/5 items-center justify-between">
        <h2 class="text-3xl font-bold">Cursos</h2>
        <div class="flex items-center justify-between gap-5">
            <a href="{{ route('cursos.create') }}" wire:navigate
                class="w-full rounded-lg border-2 border-green-500 px-5 py-2 text-sm font-semibold uppercase text-green-600 transition-all duration-100 ease-linear hover:bg-green-200">
                Adicionar Curso
            </a>
        </div>
    </div>
    <div class="w-4/5 rounded-lg py-3 shadow shadow-[#ffb966]">
        <div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>ACs</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $index => $curso)
                        <tr class="border-y text-center transition-all duration-100 ease-linear hover:bg-neutral-100"
                            wire:key="{{ $curso->id }}">

                            <td class="py-3">
                                {{ $curso->id }}
                            </td>

                            <td class="py-3">
                                {{ $curso->name }}
                            </td>

                            <td class="py-3">
                                @if ($curso->duration == 0)
                                    Indefinido
                                @else
                                    {{ $curso->duration }} Horas
                                @endif
                            </td>

                            <td class="select-none py-3">
                                @if (!$curso->areasDeConhecimento->isEmpty())
                                    <span class="cursor-pointer rounded-lg bg-green-500 px-2 py-1 text-white"
                                        x-data="{ open: false }" x-on:click="open = true">Ver
                                        UCs

                                        <div x-show="open"
                                            class="absolute inset-0 z-10 flex h-screen w-screen items-center justify-center bg-neutral-600 bg-opacity-30">
                                            <div class="min-h-[70%] min-w-[40%] cursor-default rounded-lg bg-white p-5 shadow-lg"
                                                x-on:click.away="open = false">
                                                <h2 class="mb-10 text-2xl font-bold text-neutral-700">Áreas de
                                                    Conhecimento do
                                                    Curso
                                                </h2>
                                                @foreach ($curso->areasDeConhecimento as $uc)
                                                    <span
                                                        class="rounded-lg bg-green-500 px-2 py-1 text-white">{{ $uc->name }}</span>
                                                @endforeach

                                            </div>
                                        </div>
                                    </span>
                                @else
                                    <span class="rounded-lg bg-red-500 px-2 py-1 text-white">Nenhuma AC</span>
                                @endif
                            </td>

                            <td class="min-w-24 py-3">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" id="checkbox-{{ $curso->id }}" class="peer sr-only"
                                        name="{{ $curso->id }}" wire:click='toggleStatus({{ $curso->id }})'
                                        {{ $curso->status ? 'checked' : '' }}>
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-[#ff8b00] peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#ff8b0066] rtl:peer-checked:after:-translate-x-full">
                                    </div>
                                    <div wire:loading wire:target='toggleStatus({{ $curso->id }})'
                                        class="ms-2 h-6 w-6 animate-spin rounded-full border-2 border-gray-300 border-t-[#ff8b00]">
                                    </div>

                                </label>
                            </td>

                            <td class="py-3">
                                {{ $curso->created_at->format('d/m/Y') }}
                            </td>

                            <td class="py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <div x-data="{ edit: false }" x-on:click="edit = true"
                                        wire:click="getCurso({{ $curso->id }})"
                                        class="cursor-pointer select-none rounded-lg border-2 border-yellow-500 px-5 py-2 text-sm font-semibold uppercase text-yellow-600 transition-all duration-100 ease-linear hover:bg-yellow-200">
                                        Editar

                                        <div x-show="edit"
                                            class="absolute inset-0 z-10 flex h-screen w-screen cursor-pointer items-center justify-center bg-neutral-600 bg-opacity-30">

                                            <div class="min-h-[70%] min-w-[40%] cursor-default rounded-lg bg-white p-5 shadow-lg"
                                                x-on:click.away="edit = false">

                                                <h2 class="mb-10 text-2xl font-bold text-neutral-700">Editar Curso -
                                                    {{ $curso->name }}
                                                </h2>

                                                <div class="grid grid-cols-4 gap-4">
                                                    <div class="col-span-4">
                                                        <label for="first_name"
                                                            class="mb-2 block text-sm font-medium text-gray-700">Nome do
                                                            Curso</label>
                                                        <input type="text" id="first_name" wire:model="name"
                                                            class="block w-full rounded-lg border border-[#ffb966] bg-gray-50 p-2.5 text-sm text-gray-700 shadow-[#ffb966] focus:border-[#ffb966] focus:ring-[#ffb966]"
                                                            required />
                                                    </div>
                                                    <div class="col-span-4">
                                                        <label for="first_name"
                                                            class="mb-2 block text-sm font-medium text-gray-700">Descrição
                                                            do
                                                            Curso</label>
                                                        <textarea type="text" id="first_name" wire:model="description"
                                                            class="block w-full rounded-lg border border-[#ffb966] bg-gray-50 p-2.5 text-sm text-gray-700 shadow-[#ffb966] focus:border-[#ffb966] focus:ring-[#ffb966]"
                                                            required></textarea>
                                                    </div>
                                                    <div class="col-span-4">
                                                        <button wire:click.prevent="update({{ $curso->id }})"
                                                            class="mt-4 w-full rounded-lg border-2 border-green-500 px-5 py-2 text-sm font-semibold uppercase text-green-600 transition-all duration-100 ease-linear hover:bg-green-200">
                                                            Editar Curso
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button wire:click.prevent="delete({{ $curso->id }})"
                                        class="rounded-lg border-2 border-red-500 px-5 py-2 text-sm font-semibold uppercase text-red-600 transition-all duration-100 ease-linear hover:bg-red-200">
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
