@extends('layout.admin-layout')

@section('content')
    <div class="p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Welkom, {{ auth()->user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(auth()->user()->role_id == 1)
                <a href="{{ route('admin.dishes') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Gerechten Beheer</h2>
                    <p class="text-gray-600">Voeg nieuwe gerechten toe.</p>
                </a>
            @endif

            @if(auth()->user()->role_id == 1)
                <a href="{{ route('admin.news.index') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Nieuwsberichten</h2>
                    <p class="text-gray-600">Maak nieuwe nieuws artikelen voor de website.</p>
                </a>
            @endif

            <a href="{{ route('reservations.index') }}"
               class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Tafels & Reserveringen</h2>
                <p class="text-gray-600">Beheer de reserveringen en tafels.</p>
            </a>

            @if(in_array(auth()->user()->role_id, [1, 3]))
                <a href="{{ route('waiter.calls') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Tafel Meldingen</h2>
                    <p class="text-gray-600">Bekijk welke klanten er hulp nodig hebben.</p>
                </a>
            @endif

            @if(auth()->user()->role_id == 1)
                <a href="{{ route('cms.index') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">CMS</h2>
                    <p class="text-gray-600">Maak nieuwe pagina's aan voor op de klantenwebsite.</p>
                </a>
            @endif

                @if(in_array(auth()->user()->role_id, [1, 2]))
                <a href="{{ route('checkout') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Gerechten Zoeken</h2>
                    <p class="text-gray-600">Zoek door de gerechten.</p>
                </a>
            @endif

                @if(in_array(auth()->user()->role_id, [1, 2]))
                <a href="{{ route('checkout.orders') }}"
                   class="bg-white rounded-lg shadow hover:bg-gray-100 transition-all duration-100 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Bestellingen</h2>
                    <p class="text-gray-600">Bekijken de bestellingen en voeg eventueel opmerkingen toe.</p>
                </a>
            @endif
        </div>

        <div class="mt-8 bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Paar snelle tips</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                @if(auth()->user()->role_id == 1)
                    <li>Vergeet niet de pagina's regelmatig bij te werken om seizoensgebonden veranderingen weer te
                        geven.
                    </li>
                @endif
                @if(in_array(auth()->user()->role_id, [1, 2, 3]))
                    <li>Controleer tafelreserveringen aan het begin van elke dienst.</li>
                @endif
                @if(in_array(auth()->user()->role_id, [1, 3]))
                    <li>Reageer snel op verzoeken voor tafelservice voor een betere klanttevredenheid.</li>
                @endif
                @if(auth()->user()->role_id == 1)
                    <li>Houd de nieuwssectie up-to-date met de laatste restaurantevenementen en promoties.</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
