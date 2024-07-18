@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title py-4">
        <div class="w-1/4"></div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Résultats</h2>
        <div class="w-1/4">
            <form id="logout" class="text-right pt-1 pr-4 align-middle" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">
                    <i class="fa-xl fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-col justify-center w-full">
        @foreach ($games as $game)
            <div class="flex justify-between w-full bg-gradient-date text-white px-4 py-2 text-sm">
                @if($game->competition)
                    <span>{{ $game->competition->title ?? '' }}</span>
                @endif
                <span>{{ $game->getDateView() }}</span>
                @if($game->sport)
                    <span>{{ $game->sport->title ?? '' }}</span>
                @endif
            </div>
            <div class="flex py-2">
                <div class="flex flex-col items-center justify-center w-1/3">
                    @if($game->homeTeam)
                        <span class="icons {{ $game->homeTeam->icon }}"></span>
                        <p>{{ $game->homeTeam->name ?? '' }}</p>
                    @endif
                </div>
                <div class="flex items-center justify-center w-1/3">
                    <div class="flex flex-col items-center">
                        <div class="mb-2">
                            {{ $game->getHourView() }}
                        </div>
                        <div class="flex space-x-4 w-full">
                            <input type="number" maxlength="3" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" disabled/>
                            <input type="number" maxlength="3" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" disabled />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center w-1/3">
                    @if($game->exteriorTeam)
                        <span class="icons {{ $game->exteriorTeam->icon }}"></span>
                        <p>{{ $game->exteriorTeam->name ?? '' }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <script>
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
