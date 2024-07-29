<div class="overflow-x-hidden w-full">
    <div>
        <nav class="flex w-full justify-around mb-4 overflow-x-auto flex-nowrap max-w-full scrollable-element" aria-label="Tabs">
            @foreach ($leagues as $league)
                <a href="#" wire:click.prevent="$set('selectedLeagueId', {{ $league->id }})" class="league-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg {{ $selectedLeagueId == $league->id ? 'border-focusBlueSite text-focusBlueSite' : '' }}">
                    {{ $league->title }}
                </a>
            @endforeach
        </nav>

        <!-- Navigation pour les sports -->
        <nav class="flex w-full mb-4 overflow-x-auto flex-nowrap max-w-full justify-start lg:justify-between" aria-label="Tabs">
            @foreach ($sports as $sport)
                <a href="#" wire:click.prevent="$set('selectedSportTitle', '{{ $sport }}')" class="sport-tab whitespace-nowrap py-4 px-4 border-b-2 font-medium text-lg {{ $selectedSportTitle == $sport ? 'border-focusBlueSite text-focusBlueSite' : '' }}">
                    {{ $sport }}
                </a>
            @endforeach
        </nav>
        <div class="relative min-h-[300px]">
            <div class="spinner"></div>
            <div wire:loading.remove class="relative bg-body">
                @foreach ($leaguesWithPoints as $leagueData)
                    @if ($leagueData['league']->id == $selectedLeagueId)
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
                                    @foreach ($leagueData['users']->sortByDesc('sports_points') as $index => $user)
                                        @php
                                            $i++
                                        @endphp
                                        @if ($user->sports_points->has($selectedSportTitle))
                                            <tr class="text-center border-b-2 border-b-white/30">
                                                <td class="py-2 px-4 border-right">{{ $i }}</td>
                                                <td class="py-2 px-4 border-right">{{ $user->firstname }} {{ $user->name }}</td>
                                                <td class="py-2 px-4 text-white bg-focusBlueSite/30 relative group">
                                                    @if($selectedSportTitle === 'Total')
                                                        {{ $user->sports_points['Total'] ?? 0 }}
                                                    @else
                                                        {{ $user->sports_points[$selectedSportTitle] ?? 0 }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
