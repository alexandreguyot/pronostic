<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('site/css/app.css') }}" />
    <script src="https://kit.fontawesome.com/e037e5d93a.js" crossorigin="anonymous"></script>
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    @livewireStyles
</head>

<body>
    <div class="flex flex-col items-center mb-16">
        @yield('content')
    </div>
    <div class="fixed bottom-0 bg-menu py-4 w-full z-2">
        <div class="flex justify-evenly text-white">
            <button class="text-white text-sm focus:outline-none">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('pronostics')}}" class="flex flex-col justify-center {{ request()->is("pronostics*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-basketball m-auto"></i>
                        Pronos
                    </a>
                </div>
            </button>
            <button class="text-white text-sm focus:outline-none">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('results')}}" class="flex flex-col justify-center {{ request()->is("resultats*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-medal m-auto"></i>
                        Résultats
                    </a>
                </div>
            </button>
            <button class="text-white text-sm focus:outline-none">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('rank')}}" class="flex flex-col justify-center {{ request()->is("classements*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-ranking-star m-auto"></i>
                        Classements
                    </a>
                </div>
            </button>
            <button class="text-white text-sm focus:outline-none">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('rules')}}" class="flex flex-col justify-center {{ request()->is("rules*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-bars m-auto"></i>
                        Réglements
                    </a>
                </div>
            </button>
            <button class="text-white text-sm focus:outline-none hidden">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('leagues')}}" class="flex flex-col justify-center {{ request()->is("ligues*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-bars m-auto"></i>
                        Ligues
                    </a>
                </div>
            </button>
            <button class="text-white text-sm focus:outline-none">
                <div class="items-center justify-center whitespace-nowrap">
                    <a href="{{ route('profile')}}" class="flex flex-col justify-center {{ request()->is("profil*") ? "text-focusBlueSite" : "" }}">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-user m-auto"></i>
                        Profil
                    </a>
                </div>
            </button>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('site/js/app.js') }}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
    @yield('scripts')
    @stack('scripts')
</body>
</html>
