@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title p-6 fixed z-50 fixed z-50">
        <div class="w-1/4">
            <img src="{{ asset('images/logo.png')}}" alt="logo" class="h-10">
        </div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Mes Pronos</h2>
        <div class="w-1/4">
            <form id="logout" class="text-right pt-1 pr-4 align-middle" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">
                    <i class="fa-xl fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="container mx-auto pt-28 px-4 pb-4">
        <div class="shadow-md rounded-lg border border-gray-200 p-2 mb-6">
            <h2 class="text-l font-semibold">Comment jouer ? </h2>
            <small>
                Vous avez le choix, jouer pour toutes les rencontres sportives et médailles ou pour celles que vous voulez.
                Il suffit de saisir le score pour chaque match. Si vous voyez un message "Pronostic mis à jour", c'est que votre pronostic a été pris en compte. Attention pour qu'un pari soit pris pour un match, il faut bien saisir les deux champs, même si vous souhaitez mettre 0.
                Pour les matchs de basket et handball vous avez jusqu'à la date de la rencontre pour faire vos pronos. Pour les médailles, vous avez jusqu'au 6 août pour faire vos pronostics.
            </small>
        </div>
        @foreach ($groupedPronostics as $sportTitle => $data)
            <div class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <div class="bg-gradient-sport-title text-white px-4 py-2 cursor-pointer flex w-full h-20 justify-evenly" onclick="toggleAccordion('{{ Str::slug($sportTitle) }}')">
                    @if ($data['url'])
                        <img src="{{ $data['url'] }}" alt="Image pour {{ $sportTitle }}">
                    @endif
                    <h2 class="text-lg pt-[20px]">{{ $sportTitle }}</h2>
                    <div></div>
                </div>
                <div id="{{ Str::slug($sportTitle) }}" class="hidden">
                    @foreach ($data['pronostics'] as $pronostic)
                            @if(!$pronostic->game->passed())
                            <div class="border-b border-gray-200 font-bold">
                                <div class="flex  w-full bg-gradient-date text-white py-2 text-sm items-center">
                                    @if($pronostic->game->competition)
                                        <span class="flex justify-center w-1/3">{{ $pronostic->game->competition->title ?? '' }}</span>
                                    @endif
                                    <span class="flex justify-center w-1/3">{{ $pronostic->game->getDateView() }} - {{ $pronostic->game->getHourView() }}</span>
                                    @if($pronostic->game->sport)
                                        <div class="flex justify-center items-center w-1/3">
                                            <img class="h-12 w-12 m-2" src="{{ $pronostic->game->sport->getPictoAttribute()->pluck('url')->first() }}" alt="">{{ $pronostic->game->sport->title ?? '' }} {{ $pronostic->game->tour ? '- ' . $pronostic->game->tour : ''   }}
                                        </div>
                                    @endif
                                </div>
                                <div class="flex py-2">
                                    <div class="flex flex-col items-center justify-center w-1/3">
                                        @if($pronostic->game->homeTeam)
                                            <span class="icons {{ $pronostic->game->homeTeam->icon }}"></span>
                                            <p>{{ $pronostic->game->homeTeam->name ?? '' }}</p>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-center w-1/3">
                                        <div class="flex flex-col items-center">
                                            @livewire('site.pronos', ['pronostic' => $pronostic])
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center justify-center w-1/3">
                                        @if($pronostic->game->exteriorTeam)
                                            <span class="icons {{ $pronostic->game->exteriorTeam->icon }}"></span>
                                            <p>{{ $pronostic->game->exteriorTeam->name ?? '' }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <script>
        function toggleAccordion(id) {
            var element = document.getElementById(id);
            element.classList.toggle('hidden');
        }
        document.addEventListener('DOMContentLoaded', function() {
            const digitInputs = document.querySelectorAll('.input-pronostic');

            digitInputs.forEach(input => {
                input.addEventListener('input', function(event) {
                    const value = input.value;

                    // Remove non-digit characters
                    const sanitizedValue = value.replace(/[^0-9]/g, '');

                    // Limit to 3 digits
                    if (sanitizedValue.length > 3) {
                        input.value = sanitizedValue.slice(0, 3);
                    } else {
                        input.value = sanitizedValue;
                    }
                });
            });
        });
    </script>
@endsection
