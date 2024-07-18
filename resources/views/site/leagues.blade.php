@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title py-4">
        <div class="w-1/4"></div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Mes Ligues</h2>
        <div class="w-1/4">
            <form id="logout" class="text-right pt-1 pr-4 align-middle" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">
                    <i class="fa-xl fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="flex justify-between w-full p-4">
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
