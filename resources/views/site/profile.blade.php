@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title p-6 fixed z-50">
        <div class="w-1/4">
            <img src="{{ asset('images/logo.png')}}" alt="logo" class="h-10">
        </div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Mes profil</h2>
        <div class="w-1/4">
            <form id="logout" class="text-right pt-1 pr-4 align-middle" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">
                    <i class="fa-xl fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="w-full px-4">
        @livewire('site.profile', ['user' => Auth::user()])
    </div>

@endsection
