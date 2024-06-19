<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('site/css/app.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>{{ trans('panel.site_title') }}</title>

    @livewireStyles
</head>

<body>
    <div class="flex flex-col items-center min-h-screen">
        @yield('content')

        <div class="fixed bottom-0 bg-gradient-title w-full">
            <div class="flex justify-around text-white">
                <button class="px-2 py-2 text-white text-xs focus:outline-none">
                    <div class="flex flex-col items-center justify-center whitespace-nowrap">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-trophy"></i>
                        <p>Mes pronos</p>
                    </div>
                </button>
                <button class="px-2 py-2 text-white text-xs focus:outline-none">
                    <div class="flex flex-col items-center justify-center whitespace-nowrap">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-trophy"></i>
                        <p>Résultats</p>
                    </div>
                </button>
                <button class="px-2 py-2 text-white text-xs focus:outline-none">
                    <div class="flex flex-col items-center justify-center whitespace-nowrap">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-trophy"></i>
                        <p>Classements</p>
                    </div>
                </button>
                <button class="px-2 py-2 text-white text-xs focus:outline-none">
                    <div class="flex flex-col items-center justify-center whitespace-nowrap">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-trophy"></i>
                        <p>Mes ligues</p>
                    </div>
                </button>
                <button class="px-2 py-2 text-white text-xs focus:outline-none">
                    <div class="flex flex-col items-center justify-center whitespace-nowrap">
                        <i class="fa-fw c-sidebar-nav-icon fas fa-trophy"></i>
                        <p>Profil</p>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('site/js/app.js') }}"></script>
    @livewireScripts
    @yield('scripts')
    @stack('scripts')
</body>
</html>
