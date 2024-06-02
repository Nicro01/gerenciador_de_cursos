@section('title', 'Sign in to your account')

<div class="grid grid-cols-2 mx-auto shadow shadow-[#ff8b00]">
    <div class="col-span-1 flex flex-col items-center justify-center bg-white px-10  select-none">
        <a draggable="false" href="{{ route('home') }}">
            <img src="https://unifil.br/assets/uploads/2022/11/logo-unifil.svg" class="w-48 h-32 mx-auto text-indigo-600"
                alt="Estudar Logo" />
        </a>
    </div>

    <div class="col-span-1">
        <div class="px-4 py-8 bg-[#ff8b0055] sm:px-10 shadow shadow-[#ff8b0055]">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium  text-gray-700 leading-5">
                        Email
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md bg-neutral-50 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Senha
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md bg-neutral-50focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4 items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox"
                            class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            Lembrar-me
                        </label>
                    </div>

                    <div class="text-sm leading-5">

                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-[#ff8b00] border border-transparent rounded-md hover:bg-[#ce8a36] focus:outline-none focus:border-[#99692e] focus:ring-indigo active:bg-[#ce8a36] transition duration-150 ease-in-out">
                            Entrar
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>



    {{-- Input Style --}}
    <style>
        #remember {
            border-radius: 0.25rem;
            border-color: #ff8b00AA;
            border-width: 2px;
        }

        #remember:focus {
            outline-color: #ff8b00;
        }

        #remember:checked {
            background-image: none !important;
            background-color: white;
        }

        #remember:focus-visible {
            outline-color: #ff8b00 !important;
        }

        #remember:checked::after {
            display: flex;
            justify-content: center;
            align-items: center;
            content: "";
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 0.1rem;
            margin: 0.15rem 0.1rem;
            background-color: #ff8b00;
        }
    </style>



</div>
