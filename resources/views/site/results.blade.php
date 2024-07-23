@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title p-6 fixed z-50">
        <div class="w-1/4">
            <img src="{{ asset('images/logo.png')}}" alt="logo" class="h-10">
        </div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Mes résultats</h2>
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
        @foreach ($groupedPronostics as $sportTitle => $pronostics)
            <div class="mb-4 border border-gray-200 rounded-lg overflow-hidden">
                <div class="bg-blue-600 text-white px-4 py-2 cursor-pointer" onclick="toggleAccordion('{{ Str::slug($sportTitle) }}')">
                    <h2 class="text-lg">{{ $sportTitle }}</h2>
                </div>
                <div id="{{ Str::slug($sportTitle) }}" class="hidden">
                    @foreach ($pronostics as $pronostic)
                        <div class="border-b border-gray-200">
                            <div class="flex justify-between w-full bg-gradient-date text-white px-4 py-2 text-sm">
                                @if($pronostic->game->competition)
                                    <span>{{ $pronostic->game->competition->title ?? '' }}</span>
                                @endif
                                <span>{{ $pronostic->game->getDateView() }}</span>
                                @if($pronostic->game->sport)
                                    <span>{{ $pronostic->game->sport->title ?? '' }}</span>
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
                                        <div class="mb-2">
                                            {{ $pronostic->game->getHourView() }}
                                        </div>
                                        <div class="flex space-x-4 w-full">
                                            <input type="text" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9" disabled />
                                            <input type="text" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9" disabled />
                                        </div>

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
    </script>
@endsection
