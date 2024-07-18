@extends('layouts.site')
@section('content')
    <div class="flex justify-center w-full bg-gradient-title py-4">
        <h2 class="font-bold text-xl">Mes Pronos</h2>
    </div>

    <div class="flex flex-col justify-center w-full">
        @foreach ($pronostics as $pronostic)
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
