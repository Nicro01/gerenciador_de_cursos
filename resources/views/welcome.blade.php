@extends('layouts.app')

@section('content')
    <section
        class="relative select-none overflow-hidden bg-gradient-to-b from-blue-50 via-transparent to-transparent pb-12 pt-20 sm:pb-16 sm:pt-32 lg:pb-24 xl:pb-32 xl:pt-40">
        <div class="relative z-10">
            <div
                class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 justify-center overflow-hidden [mask-image:radial-gradient(50%_45%_at_50%_55%,white,transparent)]">
                <svg class="h-[60rem] w-[100rem] flex-none stroke-[#f08223] opacity-20" aria-hidden="true">
                    <defs>
                        <pattern id="e9033f3e-f665-41a6-84ef-756f6778e6fe" width="200" height="200" x="50%" y="50%"
                            patternUnits="userSpaceOnUse" patternTransform="translate(-100 0)">
                            <path d="M.5 200V.5H200" fill="none"></path>
                        </pattern>
                    </defs>
                    <svg x="50%" y="50%" class="overflow-visible fill-blue-50">
                        <path d="M-300 0h201v201h-201Z M300 200h201v201h-201Z" stroke-width="0"></path>
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#e9033f3e-f665-41a6-84ef-756f6778e6fe)">
                    </rect>
                </svg>
            </div>
        </div>
        <div class="relative z-20 mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    NPI - COLMEIA CUBO
                    <span class="text-4xl font-semibold text-[#f08223]">Gerenciador de Cursos & Unidades Curriculares
                    </span>
                </h1>
                <h2 class="mt-6 text-lg leading-8 text-gray-600">
                    Gerencie seus cursos e unidades curriculares de forma fácil e rápida.
                </h2>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('cursos.index') }}" wire:navigate
                                class="isomorphic-link isomorphic-link--internal inline-flex items-center justify-center gap-2 rounded-xl bg-[#f08223] px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:-translate-x-1 hover:-translate-y-1 hover:bg-[#f08323c6] hover:shadow-[3px_3px_rgba(240,_130,_35,_0.4),_7px_7px_rgba(240,_130,_35,_0.3),_10px_10px_rgba(240,_130,_35,_0.2)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f08223]"
                                href="/login">Painel de Controle
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" wire:navigate
                                class="isomorphic-link isomorphic-link--internal inline-flex items-center justify-center gap-2 rounded-xl bg-[#f08223] px-4 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:-translate-x-1 hover:-translate-y-1 hover:bg-[#f08323c6] hover:shadow-[3px_3px_rgba(240,_130,_35,_0.4),_7px_7px_rgba(240,_130,_35,_0.3),_10px_10px_rgba(240,_130,_35,_0.2)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f08223]"
                                href="/login">Entrar na Conta
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        @endauth
                    @endif

                </div>
            </div>
            <div class="relative mx-auto mt-10 max-w-lg">
                <img draggable="false" class="mx-auto max-w-[80%] rounded-2xl border border-gray-100 shadow"
                    src="https://plus.unsplash.com/premium_photo-1671070290588-03d718c5f720?q=80&w=1936&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="">
            </div>
        </div>
    </section>


    <footer class="m-10 flex flex-col justify-center space-y-10">

        <nav class="flex flex-wrap justify-center gap-6 font-medium text-gray-500">

            <a class="hover:text-gray-900" href="#">Unifil</a>
            <a class="hover:text-gray-900" href="#">Login</a>
        </nav>

        <div class="flex justify-center space-x-5">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/linkedin-2.png" />
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/instagram-new.png" />
            </a>
            <a href="https://messenger.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/facebook-messenger--v2.png" />
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/twitter.png" />
            </a>
        </div>
        <p class="text-center font-medium text-gray-700">&copy; 2024 Unifil. Todos os Direitos Reservados.</p>
    </footer>
@endsection
