@extends('layouts.base')

@section('body')
    <div class="grid grid-cols-10">
        <div
            class="col-span-10 mb-10 flex items-center justify-between bg-neutral-50 px-4 py-4 shadow-md shadow-[#ff8b0099]">
            <div class="max-w-40">
                <img draggable="false" src="https://unifil.br/assets/uploads/2022/11/logo-unifil.svg" alt="">
            </div>
            <div class="flex items-center gap-4">
                <div class="flex flex-col items-end justify-center gap-1">
                    <h1 class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</h1>
                </div>
                {{-- <img draggable="false" src="https://placehold.co/600x400" alt="" class="w-12 h-12"
                    style="border-radius: 50%; object-fit: cover;"> --}}

            </div>
        </div>
        <div class="col-span-2 flex h-full min-h-[80vh] flex-col items-center justify-between">
            <div class="text-md flex w-full flex-col gap-5 px-2 text-slate-800">
                <a href="{{ route('cursos.index') }}" wire:navigate
                    class="transtion-all @if (Str::startsWith(Route::currentRouteName(), 'cursos')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif flex items-center gap-2 rounded-lg px-4 py-2 duration-100 ease-linear hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00]">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'cursos') text-[#ff8b00] font-bold @endif" /> --}}
                    Cursos
                </a>

                <a href="{{ route('ucs.index') }}" wire:navigate
                    class="transtion-all @if (Str::startsWith(Route::currentRouteName(), 'ucs')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif flex items-center gap-2 rounded-lg px-4 py-2 duration-100 ease-linear hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00]">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'ucs') text-[#ff8b00] font-bold @endif" /> --}}
                    Unidades Curriculares
                </a>

                <a href="{{ route('ac.index') }}" wire:navigate
                    class="transtion-all @if (Str::startsWith(Route::currentRouteName(), 'ac')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif flex items-center gap-2 rounded-lg px-4 py-2 duration-100 ease-linear hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00]">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'ucs') text-[#ff8b00] font-bold @endif" /> --}}
                    Áreas de Conhecimento
                </a>

                <a href="{{ route('users.index') }}" wire:navigate
                    class="transtion-all @if (Str::startsWith(Route::currentRouteName(), 'users')) shadow-sm shadow-[#ff8b00] text-[#ff8b00] @endif flex items-center gap-2 rounded-lg px-4 py-2 duration-100 ease-linear hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00]">
                    {{-- <x-feathericon-home class="max-w-5 @if (Route::currentRouteName() == 'ucs') text-[#ff8b00] font-bold @endif" /> --}}
                    Usuários
                </a>



            </div>

            <div class="w-full px-2 text-start text-lg">
                <a href="{{ route('logout') }}"
                    class="transtion-all flex items-center gap-2 rounded-lg px-4 py-2 duration-100 ease-linear hover:bg-white hover:text-[#ff8b00] hover:shadow-sm hover:shadow-[#ff8b00]">
                    Sair
                </a>
            </div>
        </div>


        <div class="col-span-8">
            @yield('content')
        </div>

    </div>
@endsection
