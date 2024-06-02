@extends('layouts.base')

@section('body')
    <div class="grid grid-cols-10 ">
        <div
            class="col-span-10 flex justify-between items-center bg-neutral-50 shadow-md shadow-[#ff8b0099] py-4 px-4 mb-10">
            <div class="max-w-40">
                <img draggable="false" src="https://unifil.br/assets/uploads/2022/11/logo-unifil.svg" alt="">
            </div>
            <div class="flex items-center gap-4">
                <div class="flex flex-col gap-1 items-end justify-center">
                    <h1 class=" text-slate-800 text-sm font-bold">{{ auth()->user()->name }}</h1>
                </div>
                {{-- <img draggable="false" src="https://placehold.co/600x400" alt="" class="w-12 h-12"
                    style="border-radius: 50%; object-fit: cover;"> --}}

            </div>
        </div>
        <div class="col-span-2 flex flex-col justify-between items-center min-h-[80vh] h-full">
            <div class="flex flex-col gap-5 text-md text-slate-800 w-full px-2">
                <a href="{{ route('cursos.index') }}" wire:navigate
                    class="px-4 py-2 flex items-center rounded-lg gap-2 hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00] transtion-all duration-100 ease-linear
                    @if (Str::startsWith(Route::currentRouteName(), 'cursos')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'cursos') text-[#ff8b00] font-bold @endif" /> --}}
                    Cursos
                </a>

                <a href="{{ route('ucs.index') }}" wire:navigate
                    class="px-4 py-2 flex items-center rounded-lg gap-2 hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00] transtion-all duration-100 ease-linear
                    @if (Str::startsWith(Route::currentRouteName(), 'ucs')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'ucs') text-[#ff8b00] font-bold @endif" /> --}}
                    Unidades Curriculares
                </a>

                <a href="{{ route('users.index') }}" wire:navigate
                    class="px-4 py-2 flex items-center rounded-lg gap-2 hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00] transtion-all duration-100 ease-linear
                    @if (Str::startsWith(Route::currentRouteName(), 'users')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'ucs') text-[#ff8b00] font-bold @endif" /> --}}
                    Usuários
                </a>

            </div>

            <div class="text-lg text-start w-full px-2">
                <a href="{{ route('logout') }}"
                    class="px-4 py-2 flex items-center rounded-lg gap-2 hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00] transtion-all duration-100 ease-linear">
                    Sair
                </a>
            </div>
        </div>


        <div class="col-span-8">
            @yield('content')
        </div>

    </div>
@endsection
