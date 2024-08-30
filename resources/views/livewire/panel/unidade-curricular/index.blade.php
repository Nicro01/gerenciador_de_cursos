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
        <h2 class="text-3xl font-bold">Unidades Curriculares</h2>
        <div class="flex items-center justify-between gap-5">
            <a href="{{ route('ucs.create') }}" wire:navigate
                class="w-full rounded-lg border-2 border-green-500 px-5 py-2 text-sm font-semibold uppercase text-green-600 transition-all duration-100 ease-linear hover:bg-green-200">
                Adicionar Unidade Curricular
            </a>
        </div>
    </div>
    <div class="w-4/5 rounded-lg py-3 shadow shadow-[#ffb966]">
        <div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ucs as $index => $uc)
                        <tr class="border-y text-center transition-all duration-100 ease-linear hover:bg-neutral-100"
                            wire:key="{{ $uc->id }}">

                            <td class="py-3">
                                {{ $uc->name }}
                            </td>

                            <td class="py-3">
                                {{ $uc->duration }} Horas
                            </td>

                            <td class="min-w-24 py-3">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" id="checkbox-{{ $uc->id }}" class="peer sr-only"
                                        name="{{ $uc->id }}" wire:click='toggleStatus({{ $uc->id }})'
                                        {{ $uc->status ? 'checked' : '' }}>
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-[#ff8b00] peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#ff8b0066] rtl:peer-checked:after:-translate-x-full">
                                    </div>
                                    <div wire:loading wire:target='toggleStatus({{ $uc->id }})'
                                        class="ms-2 h-6 w-6 animate-spin rounded-full border-2 border-gray-300 border-t-[#ff8b00]">
                                    </div>

                                </label>
                            </td>

                            <td class="py-3">
                                {{ $uc->created_at->format('d/m/Y') }}
                            </td>

                            <td class="py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <div x-on:click="$modalOpen('edit-uc'); $wire.getUC({{ $uc->id }})"
                                        class="cursor-pointer select-none rounded-lg border-2 border-yellow-500 px-5 py-2 text-sm font-semibold uppercase text-yellow-600 transition-all duration-100 ease-linear hover:bg-yellow-200">
                                        Editar
                                    </div>
                                    <button wire:click="delete({{ $uc->id }})"
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

    <x-modal title="Editar UC - {{ $name }}" id="edit-uc" center blur="sm">

        <div class="my-2">
            <x-input label="Nome *" hint="Insira seu nome novo" name="name" value="{{ $name }}"
                wire:model="name" />
        </div>

        <div class="my-2">
            <x-textarea label="Descrição *" value="{{ $description }}" wire:model="description" />
        </div>

        <div class="my-2">
            <x-input label="Carga Horária *" type="number" name="duration" wire:model="duration"
                value="{{ $duration }}" />
        </div>

        <div class="mt-6 flex flex-col gap-2">
            <span>Área de Conhecimento</span>
            <select id="countries" wire:model="area_de_conhecimento" value="0"
                class="mt-1 block w-full rounded-lg border-none bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm shadow-[#ffb966] focus:border focus:border-[#ffb966] focus:ring-[#ffb966]">
                <option value="0" selected disabled>Selecione uma Área
                    de Conhecimento
                </option>
                @if ($acs)
                    @foreach ($acs as $ac)
                        <option value="{{ $ac->id }}">
                            {{ $ac->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <x-slot:footer>
            <x-button text="Salvar" x-on:click="update; $modalClose('edit-uc')" />
        </x-slot:footer>
    </x-modal>
</div>
