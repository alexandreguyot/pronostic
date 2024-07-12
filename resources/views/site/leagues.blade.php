@extends('layouts.site')
@section('content')
    <div class="flex justify-center w-full bg-gradient-title py-4">
        <h2 class="font-bold text-xl">Mes Ligues</h2>
    </div>

    <div class="flex justify-between  w-full">
        @livewire('site.league.create')
        @livewire('site.league.join')
    </div>

    <div class="flex flex-col justify-center w-full">
        @foreach ($leagues as $league)
            <div class="flex justify-between border-2 rounded-md p-4 m-4">
                <p>{{ $league->title }}</p>
                <div class="text-focusBlueSite">
                    <a href="{{ route('league', $league)}}">Accéder à la ligue</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container mx-auto">

    </div>
@endsection
