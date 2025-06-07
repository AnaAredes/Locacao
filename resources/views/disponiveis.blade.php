<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas em Destaque</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Open+Sans:wght@300;400;600&display=swap"
        rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="beige-light">
    @include('layouts.navigation')
    <main>
        <!-- Barra de filtro -->
        <section class="pt-[70px] relative">
            <div
                class="bg-gradient-to-r from-white via-gray-50 to-white shadow-lg rounded-xl p-6 mb-2 border border-gray-100">
                <form action="{{ route('disponiveis') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Data de Chegada -->
                    <div>
                        <label for="data_inicio" class="block text-sm font-semibold text-gray-700 mb-1">
                            📅 Data de Chegada
                        </label>
                        <input type="date" id="data_inicio" name="data_inicio" value="{{ request('data_inicio') }}"
                            min="{{ date('Y-m-d') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-dark focus:border-purple-dark shadow-sm"
                            required>
                    </div>

                    <!-- Data de Saída -->
                    <div>
                        <label for="data_fim" class="block text-sm font-semibold text-gray-700 mb-1">
                            📆 Data de Saída
                        </label>
                        <input type="date" id="data_fim" name="data_fim" value="{{ request('data_fim') }}"
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-dark focus:border-purple-dark shadow-sm"
                            required>
                    </div>

                    <!-- Número de Hóspedes -->
                    <div>
                        <label for="hospedes" class="block text-sm font-semibold text-gray-700 mb-1">
                            👥 Número de Hóspedes
                        </label>
                        <select id="hospedes" name="hospedes"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-dark focus:border-purple-dark shadow-sm">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ request('hospedes') == $i ? 'selected' : '' }}>
                                    {{ $i }} {{ $i == 1 ? 'hóspede' : 'hóspedes' }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Botão -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full flex items-center justify-center bg-purple-light hover:bg-purple-dark text-white font-semibold px-6 py-2 rounded-md transition duration-300 shadow-md">
                            Verificar Disponibilidade
                        </button>
                    </div>
                </form>
            </div>
        </section>



        @if (session('error'))
            <div
                class="alert alert-error shadow-lg rounded-lg py-4 px-6 font-semibold text-red-800 bg-red-100 ring-1 ring-red-300 flex items-center space-x-2">
                <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 0114.14 0m0 14.14a10 10 0 01-14.14 0m14.14-14.14a10 10 0 00-14.14 0m14.14 14.14a10 10 0 01-14.14 0" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <section class="mt-2 relative h-[45vh]">
            <div class="container mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-8">Casas de Férias</h1>

                @if ($bens->isEmpty())
                    <div class="text-center text-gray-600">Não há propriedades disponíveis</div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($bens as $bem)
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer"
                                onclick="openModal({{ $bem->id }})" role="button" tabindex="0">
                                <div class="relative aspect-w-16 aspect-h-9">
                                    <img src="{{ $bem->imageUrl ?? 'https://images.unsplash.com/photo-1699209148943-acacf2821f33?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGNhc2ElMjBtYWRlaXJhfGVufDB8fDB8fHww' }}"
                                        alt="{{ $bem->modelo }}"
                                        class="w-full h-48 object-cover hover:opacity-90 transition-opacity duration-300"
                                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1560518883-ce09059eeffa';"
                                        loading="lazy">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $bem->modelo }}</h3>
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z">
                                            </path>
                                        </svg>
                                        <span class="text-gray-600">{{ $bem->numero_hospedes }} hóspedes</span>
                                    </div>
                                    <div class="text-lg font-bold text-purple-light">
                                        {{ number_format($bem->preco_diario, 2, ',', '.') }} € <span
                                            class="text-sm font-normal text-gray-600">/por noite</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- Modal -->
        <div id="propertyModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4">
                <img id="modalImagem" src="" alt="Property Image"
                    class="w-full h-64 object-cover rounded-lg mb-4"
                    onerror="this.onerror=null; this.src='https://plus.unsplash.com/premium_photo-1686782502443-1d56f3beb9e3?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGNhc2ElMjBtYWRlaXJhfGVufDB8fDB8fHww';">
                <h2 id="modalTitulo" class="text-2xl text-purple-light font-bold mb-4 flex items-center justify-center">
                </h2>

                <div class="flex gap-x-8 items-center justify-center text-gray-600 mb-4">
                    <!-- Par 1: Ícone + Texto: Número de Hóspedes -->
                    <div class="flex items-center gap-x-1">
                        <svg class="w-5 h-5 text-purple-light" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <span id="modalHospedes" class="text-sm text-gray-800 sm:text-base md:text-lg"></span>
                    </div>

                    <!-- Par 2: Número de Casas de Banho -->
                    <div class="flex items-center gap-x-1">
                        <svg class="w-5 h-5 text-purple-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <circle cx="8" cy="17" r="1" />
                            <circle cx="12" cy="17" r="1" />
                            <circle cx="16" cy="17" r="1" />
                            <path d="M13,5.08V3h-2v2.08C7.61,5.57,5,8.47,5,12v2h14v-2C19,8.47,16.39,5.57,13,5.08z" />
                            <circle cx="8" cy="20" r="1" />
                            <circle cx="12" cy="20" r="1" />
                            <circle cx="16" cy="20" r="1" />
                        </svg>
                        <span id="modalCasaBanho" class="text-sm text-gray-800 sm:text-base md:text-lg"></span>
                    </div>

                    <!-- Par 3: Número de Camas -->
                    <div class="flex items-center gap-x-1">
                        <svg class="w-5 h-5 text-purple-light" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zM19 7h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                        </svg>
                        <span id="modalNumeroCamas" class="text-sm text-gray-800 sm:text-base md:text-lg"></span>
                    </div>
                </div>

                <p id="modalPreco"
                    class="text-2xl font-bold text-purple-light mb-4 flex items-center justify-center "></p>

                <button onclick="verDetalhes()"
                    class="w-full bg-purple-dark text-white px-6 py-2 rounded-lg hover:bg-purple-light transition focus:outline-none focus:ring-2 focus:ring-purple-light focus:ring-offset-2">
                    Ver Mais
                </button>
            </div>
        </div>


        <script>
            window.properties = @json($bens);
        </script>

    </main>

<!-- JS: chamo app.js pelo import (vite(['resources/js/app.js'])). 
Se optasse por guardar na pasta public/js, poderia chamar pelo assets
ex.:  <script src="{ asset('js/modal.js') }}"></script> #com uma chaveta antes do asset
    <script src="{ asset('js/filtro-data.js') }}"></script> #com uma chaveta antes do asset
-->
</body>

</html>
