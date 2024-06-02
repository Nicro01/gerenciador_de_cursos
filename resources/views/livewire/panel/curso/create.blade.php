<div class="flex flex-col gap-8 items-center justify-center">
    <div class="w-4/5 flex justify-between items-center">
        <h2 class="font-bold text-3xl">Novo Curso</h2>
        <div class="flex items-center justify-between gap-5">

        </div>
    </div>
    <div class=" shadow shadow-[#ffb966] w-4/5 pt-3 rounded-lg">
        <div class="col-span-10 py-4 px-10 mb-10">

            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">Nome do Curso</label>
                    <input type="text" id="first_name" wire:model="name"
                        class="bg-gray-50 border border-[#ffb966] text-gray-700 shadow-[#ffb966] text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966]  block w-full p-2.5"
                        required />
                </div>
                <div class="col-span-4">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">Descrição do
                        Curso</label>
                    <textarea type="text" id="first_name" wire:model="description"
                        class="bg-gray-50 border border-[#ffb966] text-gray-700 shadow-[#ffb966] text-sm rounded-lg focus:ring-[#ffb966] focus:border-[#ffb966]  block w-full p-2.5"
                        required></textarea>
                </div>


                <div class="col-span-4">
                    <button wire:click.prevent="store"
                        class="w-full text-sm px-5 font-semibold uppercase text-green-600 hover:bg-green-200 border-2 border-green-500 rounded-lg mt-4 py-2 transition-all duration-100 ease-linear">
                        Criar Curso
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
