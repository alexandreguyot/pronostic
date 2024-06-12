<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('game_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Game" format="csv" />
                <livewire:excel-export model="Game" format="xlsx" />
                <livewire:excel-export model="Game" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.game.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.competition') }}
                            @include('components.table.sort', ['field' => 'competition.title'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.tour') }}
                            @include('components.table.sort', ['field' => 'tour'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.date_time') }}
                            @include('components.table.sort', ['field' => 'date_time'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.home_team') }}
                            @include('components.table.sort', ['field' => 'home_team.name'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.home_score') }}
                            @include('components.table.sort', ['field' => 'home_score'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.exterior_team') }}
                            @include('components.table.sort', ['field' => 'exterior_team.name'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.exterior_score') }}
                            @include('components.table.sort', ['field' => 'exterior_score'])
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
                                <input type="checkbox" value="{{ $game->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $game->id }}
                            </td>
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
                                @if($game->exteriorTeam)
                                    <span class="badge badge-relationship">{{ $game->exteriorTeam->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $game->exterior_score }}
                            </td>
                            <td>
                                @if($game->sport)
                                    <span class="badge badge-relationship">{{ $game->sport->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('game_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.games.show', $game) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('game_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.games.edit', $game) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('game_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $game->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
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