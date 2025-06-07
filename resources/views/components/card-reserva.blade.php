<div class="flex items-center justify-center p-4">
    <div
        class="max-w-xl w-full bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:scale-[1.02]">
        <div class="bg-gradient-to-r from-purple-800 to-orange-200 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-beige-light">{{ $bem->modelo }}</h2>
                <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">Confirmado</span>
            </div>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <div class="text-gray-500 text-sm">Check-in</div>
                    <div class="font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($bem->data_inicio)->locale('pt_BR')->translatedFormat('d \d\e F \d\e Y') }}
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="text-gray-500 text-sm">Check-out</div>
                    <div class="font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($bem->data_fim)->locale('pt_BR')->translatedFormat('d \d\e F \d\e Y') }}
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <div class="text-gray-500 text-sm">Cidade</div>
                        <div class="font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            {{ $bem->cidade }}
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($caracteristicas as $caracteristica)
                                <span class="px-3 py-1 bg-purple-light text-beige-light rounded-full text-sm">
                                    {{ $caracteristica }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6">
                <div class="flex items-center justify-between">
                    <div class="text-gray-500">Total Pago</div>
                    <div class="text-2xl font-bold text-purple-800">
                        {{ \Carbon\Carbon::parse($bem->data_inicio)->diffInDays(\Carbon\Carbon::parse($bem->data_fim)) * $bem->preco_diario }}
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('descarregar', $bem->reserva_id) }}"
                   class="w-full bg-purple-dark hover:bg-purple-light text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Gerar PDF
                </a>

                <a href="{{ route('send.emailconfirmacao', ['reserva_id' => $bem->reserva_id]) }}"
                   target="_blank"
                   class="w-full bg-purple-dark hover:bg-purple-light text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                    Enviar por E-mail
                </a>
            </div>
        </div>
    </div>
</div>