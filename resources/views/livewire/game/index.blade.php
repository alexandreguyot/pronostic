<div>
    <div class="w-full px-3 py-3">
        Recherche:
        <input type="text" wire:model.debounce.300ms="search" class="inline-block w-full sm:w-1/3" />
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table w-full table-index">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.game.fields.competition') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.tour') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.date_time') }}
                            @include('components.table.sort', ['field' => 'date_time'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.home_team') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.home_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.exterior_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.exterior_team') }}
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.sport') }}
                            @include('components.table.sort', ['field' => 'sport.title'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($games as $game)
                        <tr>
                            <td>
                                @if($game->competition)
                                    <span class="badge badge-relationship">{{ $game->competition->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $game->tour }}
                            </td>
                            <td>
                                {{ $game->date_time }}
                            </td>
                            <td>
                                @if($game->homeTeam)
                                    <span class="badge badge-relationship">{{ $game->homeTeam->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $game->home_score }}
                            </td>
                            <td>
                                {{ $game->exterior_score }}
                            </td>
                            <td>
                                @if($game->exteriorTeam)
                                    <span class="badge badge-relationship">{{ $game->exteriorTeam->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($game->sport)
                                    <span class="badge badge-relationship">{{ $game->sport->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('game_show')
                                        <a class="mr-2 btn btn-sm btn-info" href="{{ route('admin.games.show', $game) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('game_edit')
                                        <a class="mr-2 btn btn-sm btn-success" href="{{ route('admin.games.edit', $game) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('game_delete')
                                        <button class="mr-2 btn btn-sm btn-rose" type="button" wire:click="confirm('delete', {{ $game->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">Aucune entrée trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $games->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
