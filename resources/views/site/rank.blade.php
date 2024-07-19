@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title py-4">
        <div class="w-1/4"></div>
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
    @foreach ($leagues as $league)
        <div class="p-6 w-full">
            <div data-content="{{ $league->id}}">
                <table class="w-full bg-transparent">
                    <thead>
                        <tr class="border-b-2 border-t-2 border-b-white/30 border-t-white/30">
                            <th class="py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-right"></th>
                            <th class="py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-r-2 border-r-white/30">Joueur</th>
                            <th class="py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider">Points</th>
                        </tr>
                    </thead>
                    <tbody class="bg-transparent">
                        <tr class="text-center border-b-2 border-b-white/30">
                            <td class="py-2 px-4 border-right">1</td>
                            <td class="py-2 px-4 border-right">Team A</td>
                            <td class="py-2 px-4 text-white bg-focusBlueSite/30">86</td>
                        </tr>
                        <tr class="text-center border-b-2 border-b-white/30">
                            <td class="py-2 px-4 border-right">2</td>
                            <td class="py-2 px-4 border-right">Team B</td>
                            <td class="py-2 px-4 text-white bg-focusBlueSite/30">82</td>
                        </tr>
                        <tr class="text-center border-b-2 border-b-white/30">
                            <td class="py-2 px-4 border-right">3</td>
                            <td class="py-2 px-4 border-right">Team C</td>
                            <td class="py-2 px-4 text-white bg-focusBlueSite/30">75</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
