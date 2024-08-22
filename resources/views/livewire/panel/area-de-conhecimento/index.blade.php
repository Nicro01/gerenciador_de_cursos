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
        <h2 class="text-3xl font-bold">Áreas de Conhecimento</h2>
        <div class="flex items-center justify-between gap-5">
            <a href="{{ route('ac.create') }}" wire:navigate
                class="w-full rounded-lg border-2 border-green-500 px-5 py-2 text-sm font-semibold uppercase text-green-600 transition-all duration-100 ease-linear hover:bg-green-200">
                Adicionar Área de Conhecimento
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
                        <th>Cor</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acs as $index => $ac)
                        <tr class="border-y text-center transition-all duration-100 ease-linear hover:bg-neutral-100"
                            wire:key="{{ $ac->id }}">

                            <td class="py-3">
                                {{ $ac->id }}
                            </td>

                            <td class="py-3">
                                {{ $ac->name }}
                            </td>

                            <td class="flex select-all items-center justify-center py-3">
                                <div class="size-10 cursor-pointer rounded-full p-2 transition-all duration-100 ease-linear hover:scale-[1.02]"
                                    style="background-color: {{ $ac->color }}; box-shadow: 0px 1px 10px 1px {{ $ac->color }}88">

                                </div>
                            </td>

                            <td class="min-w-24 py-3">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" id="checkbox-{{ $ac->id }}" class="peer sr-only"
                                        name="{{ $ac->id }}" wire:click='toggleStatus({{ $ac->id }})'
                                        {{ $ac->status ? 'checked' : '' }}>
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-[#ff8b00] peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#ff8b0066] rtl:peer-checked:after:-translate-x-full">
                                    </div>
                                    <div wire:loading wire:target='toggleStatus({{ $ac->id }})'
                                        class="ms-2 h-6 w-6 animate-spin rounded-full border-2 border-gray-300 border-t-[#ff8b00]">
                                    </div>

                                </label>
                            </td>

                            <td class="py-3">
                                {{ $ac->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                <button wire:click.prevent="delete({{ $ac->id }})"
                                    class="rounded-lg border-2 border-red-500 px-5 py-2 text-sm font-semibold uppercase text-red-600 transition-all duration-100 ease-linear hover:bg-red-200">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
</div>
