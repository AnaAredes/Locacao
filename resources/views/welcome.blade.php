<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paraíso: Casas de Férias</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Open+Sans:wght@300;400;600&display=swap"
        rel="stylesheet">
    <!-- Se utilizasse: Chamaria: font-['Open Sans'] ou font-['Montserrat']
Em alternativa, adicionei as fontes no tailwind.config.js
 -->

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="beige-light">
    @include('layouts.navigation')

     <main>
        <section class="pt-[60px] relative h-[50vh]">
            <img src="https://images.unsplash.com/photo-1523365154888-8a758819b722" alt="Natureza Portuguesa"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <div class="text-center text-beige-light px-4 flex flex-col items-center">
                    <h1 class="text-3xl md:text-5xl font-bold m-7">
                        Do litoral às montanhas lusas, casas únicas em locais incríveis
                    </h1>
                    <div class="flex justify-center w-full">
                        <a href="/disponiveis">
                            <button
                                class="bg-purple-dark text-beige-light px-12 py-4 rounded-full font-semibold transform hover:scale-105 transition duration-300 flex items-center justify-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <span>Pesquisar</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                {{-- Bloco 1 --}}
                <a href="{{ route('localizacao', ['cidades' => 'Albufeira']) }}" class="block">
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                        <img src="https://images.unsplash.com/photo-1691509650490-20a782f4044a?q=80&w=1940&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Família na Praia"
                        class="w-full h-80 object-cover transition duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <div class="text-beige-light">
                                <h3 class="text-2xl font-bold mb-2">Praia do Baleal</h3>
                                <p class="opacity-90">Casas de Praia</p>
                            </div>
                        </div>
                    </div>
                </a>


                 {{-- Bloco 2 --}}
                <a href="{{ route('localizacao', ['cidades' => 'Peniche']) }}" class="block">
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                        <img src="https://images.unsplash.com/photo-1559734840-f9509ee5677f?q=80&w=1974&auto=format&fit=crop"
                        alt="Família na Praia"
                        class="w-full h-80 object-cover transition duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <div class="text-beige-light">
                                <h3 class="text-2xl font-bold mb-2">Praia da Oura</h3>
                                <p class="opacity-90">Casas de Praia</p>
                            </div>
                        </div>
                    </div>
                </a>


                {{-- Bloco 3 --}}
                 <a href="{{ route('localizacao', ['cidades' => 'Gerês']) }}" class="block">
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                        <img src="https://plus.unsplash.com/premium_photo-1730078556503-5d8fc0587b23?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                            alt="Amigos em Férias"
                            class="w-full h-80 object-cover transition duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <div class="text-beige-light">
                                <h3 class="text-2xl font-bold mb-2">Gerês</h3>
                                <p class="opacity-90">Casas na Montanha</p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Bloco 4 --}}
                  <a href="{{ route('localizacao', ['cidades' => 'Setúbal']) }}" class="block">
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                        <img src="https://images.unsplash.com/photo-1542359649-31e03cd4d909" 
                            alt="Natureza e Aventura"
                            class="w-full h-80 object-cover transition duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <div class="text-beige-light">
                                <h3 class="text-2xl font-bold mb-2">Natureza</h3>
                                <p class="opacity-90">Parque Natural da Arrábica</p>
                            </div>
                        </div>
                    </div>
                </a>

                 {{-- Bloco 4 --}}
                  <a href="{{ route('localizacao', ['cidades' => 'Porto']) }}" class="block">
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg transition duration-300 hover:shadow-xl">
                        <img src="https://images.unsplash.com/photo-1603657289433-e4983d2114b9?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                            alt="Natureza e Aventura"
                            class="w-full h-80 object-cover transition duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                            <div class="text-beige-light">
                                <h3 class="text-2xl font-bold mb-2">Foz do Douro</h3>
                                <p class="opacity-90">Natureza</p>
                            </div>
                        </div>
                    </div>
                </a>
        </section>

        <section class="bg-gray-50 py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-purple-dark">Pronto para sua próxima aventura?</h2>
                <div class="flex justify-center">

                    <a href="/disponiveis">
                        <button
                            class="bg-purple-dark text-beige-light px-8 py-3 mt-4 rounded-full font-semibold transform hover:scale-105 transition duration-300 flex items-center justify-center space-x-3">
                            As nossas casas em Portugal
                        </button>
                    </a>
                </div>
            </div>

        </section>

        <footer class="bg-purple-dark text-beige-light py-12">
            <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">Paraíso</h4>
                    <p class="text-beige-light">Suas férias dos sonhos começam aqui</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Destinos</h4>
                    <ul class="space-y-2 text-beige-light">
                        <li><a href="{{ route('localizacao', ['cidades' => 'Albufeira,Peniche']) }}" class="hover:text-white transition">Casas na Praia</a></li>
                        <li><a href="{{ route('localizacao', ['cidades' => 'Setúbal']) }}" class="hover:text-white transition">Parque Natural</a></li>
                        <li><a href="{{ route('localizacao', ['cidades' => 'Gerês']) }}" class="hover:text-white transition">Casas na Montanha</a></li>
                        <li><a href="{{ route('localizacao', ['cidades' => 'Porto']) }}" class="hover:text-white transition">Foz do Douro</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Sobre</h4>
                    <ul class="space-y-2 text-beige-light">
                        <li><a href="#" class="hover:text-white transition">Nossa História</a></li>
                        <li><a href="#" class="hover:text-white transition">Contato</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                </div>
            </div>
        </footer>
    </main>

</body>

</html>
