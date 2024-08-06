<div class="overflow-x-hidden w-full">
    <!-- Navigation des ligues -->
    <nav class="flex w-full justify-around mb-4 overflow-x-auto flex-nowrap max-w-full scrollable-element" aria-label="Tabs">
        @foreach ($results->get('leagues', []) as $leagueTitle => $leagueData)
            <a href="#" wire:click.prevent="$set('selectedLeagueTitle', '{{ $leagueTitle }}')" class="league-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg {{ $selectedLeagueTitle == $leagueTitle ? 'border-focusBlueSite text-focusBlueSite' : '' }}">
                {{ $leagueTitle }}
            </a>
        @endforeach
    </nav>

    <!-- Navigation des sports -->
    @if($selectedLeagueTitle)
        <nav class="flex w-full mb-4 overflow-x-auto flex-nowrap max-w-full justify-start lg:justify-between" aria-label="Tabs">
            @foreach ($results['leagues'][$selectedLeagueTitle]['sports'] as $sportTitle => $sportData)
                <a href="#" wire:click.prevent="$set('selectedSportTitle', '{{ $sportTitle }}')" class="sport-tab whitespace-nowrap py-4 px-4 border-b-2 font-medium text-lg {{ $selectedSportTitle == $sportTitle ? 'border-focusBlueSite text-focusBlueSite' : '' }}">
                    {{ $sportTitle }}
                </a>
            @endforeach
        </nav>
    @endif

    <!-- Tableau des points -->
    <div class="relative min-h-[300px]">
        <div class="spinner" wire:loading></div>
        <div wire:loading.remove class="relative bg-body">
            <div class="mb-8">
                <table class="w-full bg-transparent">
                    <thead class="w-full">
                        <tr class="w-full border-b-2 border-t-2 border-b-white/30 border-t-white/30">
                            <th class="py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-right w-1/5"></th>
                            <th class="w-3/5 py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider border-r-2 border-r-white/30">Joueur</th>
                            <th class="w-1/5 py-2 px-4 text-lg text-center leading-4 font-medium text-focusBlueSite uppercase tracking-wider">Points</th>
                        </tr>
                    </thead>
                    <tbody class="bg-transparent">
                            @php $i = 0; @endphp
                            @foreach (collect($ranking)->sortByDesc($selectedSportTitle === 'Total' ? 'Total_sport_points' : $selectedSportTitle.'_sport_points') as $user)
                                @php $i++; @endphp
                                <tr class="text-center border-b-2 border-b-white/30">
                                    <td class="py-2 px-4 border-right">{{ $i }}</td>
                                    <td class="py-2 px-4 border-right">{{ $user['firstname']. ' ' .$user['name'] }}</td>
                                    @if($selectedSportTitle === 'Total')
                                        <td class="py-2 px-4 text-white bg-focusBlueSite/30 relative group">{{ $user['Total_sport_points'] ?? 0 }}</td>
                                    @else
                                        <td class="py-2 px-4 text-white bg-focusBlueSite/30 relative group">{{ $user[$selectedSportTitle.'_sport_points'] ?? 0 }}</td>
                                    @endif
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
