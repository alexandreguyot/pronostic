@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title p-6">
        <div class="w-1/4">
            <img src="{{ asset('images/logo.png')}}" alt="logo" class="h-10">
        </div>
        <h2 class="w-2/4 font-bold text-2xl text-center">Classements</h2>
        <div class="w-1/4">
            <form id="logout" class="text-right pt-1 pr-4 align-middle" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">
                    <i class="fa-xl fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>

    <nav class="flex w-full justify-around" aria-label="Tabs">
        @foreach ($leagues as $league)
            <a href="#" data-tab="{{ $league->id}}" class="tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-l">
                Wiztivi Pronostic
            </a>
        @endforeach
    </nav>
    @foreach ($leaguesWithPoints as $leagueData)
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-center mb-4">{{ $leagueData['league']->name }}</h2>
            <table class="w-full bg-transparent">
                <thead  class="w-full" >
                    <tr class="w-full border-b-2 border-t-2 border-b-white/30 border-t-white/30">
                        <th class="py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-right w-1/5"></th>
                        <th class="w-3/5 py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-r-2 border-r-white/30">Joueur</th>
                        <th class="w-1/5 selection:py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider">Points</th>
                    </tr>
                </thead>
                <tbody class="bg-transparent">
                    @foreach ($leagueData['users'] as $index => $user)
                        <tr class="text-center border-b-2 border-b-white/30">
                            <td class="py-2 px-4 border-right">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-right">{{ $user->name }} {{ $user->firstname }}</td>
                            <td class="py-2 px-4 text-white bg-focusBlueSite/30 relative group">
                                {{ $user->total_points }}
                                <!-- Info Icon -->
                                <span class="inline-block ml-2 text-xs text-white rounded-full p-1 cursor-pointer relative">
                                    <i class="fa fa-info-circle"></i>
                                    <!-- Tooltip -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 top-full mt-2 bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap z-10 hidden group-hover:block">
                                        @foreach ($user->sports_points as $sport => $points)
                                            <div>{{ $sport }}: {{ $points }} points</div>
                                        @endforeach
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = e.target.getAttribute('data-tab');

                    // tabs.forEach(t => {
                    //     t.classList.remove('text-blue-600', 'border-blue-500');
                    //     t.classList.add('text-gray-500', 'border-transparent');
                    // });
                    // e.target.classList.add('text-blue-600', 'border-blue-500');
                    e.target.classList.remove('text-gray-500', 'border-transparent');

                    contents.forEach(content => {
                        content.classList.add('hidden');
                        if (content.getAttribute('data-content') === target) {
                            content.classList.remove('hidden');
                        }
                    });
                });
            });
        });
    </script>
@endsection
