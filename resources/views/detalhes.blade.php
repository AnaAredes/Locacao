<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bem->modelo }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Open+Sans:wght@300;400;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50">
    @include('layouts.navigation')
    <section class="pt-[50px] relative">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-lg">
                        <img src="{{ $bem->imageUrl ?? 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750' }}"
                            alt="{{ $bem->modelo }}"
                            class="w-full h-96 object-cover cursor-pointer transform transition duration-300 hover:scale-105">
                    </div>
                    <div class="grid grid-cols-3 gap-4 mt-6">
                        <img src="https://images.unsplash.com/photo-1560448204-603b3fc33ddc" alt="Foto1"
                            class="rounded-lg cursor-pointer transform transition duration-300 hover:scale-150">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c" alt="Foto2"
                            class="rounded-lg cursor-pointer transform transition duration-300 hover:scale-150">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a" alt="Foto3"
                            class="rounded-lg cursor-pointer transform transition duration-300 hover:scale-150">
                    </div>
                </div>
                <div class="space-y-6">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900">{{ $bem->modelo }}</h1>
                        <p class="text-xl text-gray-600 mt-2">{{ $bem->filial }}, {{ $bem->posicao }}</p>
                        <p class="text-xl text-gray-600 mt-2">{{ $bem->cidade }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <x-info-box :data="$bem->numero_quartos" text="quartos">
                            <svg class="w-5 h-5 text-purple-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>

                        </x-info-box>

                        <x-info-box :data="$bem->numero_casas_banho" text="casas de banho">
                            <svg class="w-5 h-5 text-purple-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="8" cy="17" r="1" />
                                <circle cx="12" cy="17" r="1" />
                                <circle cx="16" cy="17" r="1" />
                                <path
                                    d="M13,5.08V3h-2v2.08C7.61,5.57,5,8.47,5,12v2h14v-2C19,8.47,16.39,5.57,13,5.08z" />
                                <circle cx="8" cy="20" r="1" />
                                <circle cx="12" cy="20" r="1" />
                                <circle cx="16" cy="20" r="1" />
                            </svg>
                        </x-info-box>

                        <x-info-box :data="$bem->numero_camas" text="camas">
                            <svg class="w-5 h-5 text-purple-dark" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zM19 7h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                            </svg>
                        </x-info-box>

                        <x-info-box :data="$bem->numero_hospedes" text="hóspedes">
                            <svg class="w-5 h-5 text-purple-dark" fill="none" stroke="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </x-info-box>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-gray-900">Detalhes</h2>
                        <p class="text-gray-600">{{ $bem->marca_obs }}</p>
                        <ul class="grid grid-cols-2 gap-4">
                            @foreach ($caracteristicas as $caracteristica)
                                <li class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-orange-dark" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ $caracteristica }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-gray-900">Valor da Diária</h2>
                        <p class="text-3xl font-bold text-purple-dark">{{ $bem->preco_diario }}€</p>
                        <a href="{{ route('reserva.index') }}">
                            <button
                                class="w-full bg-purple-dark text-white px-6 py-2 mt-2 rounded-lg hover:bg-purple-light transition focus:outline-none focus:ring-2 focus:ring-purple-light focus:ring-offset-2">Reserve</button>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </section>
</body>

</html>
