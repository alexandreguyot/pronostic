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
                            {{ trans('cruds.pronostic.fields.game') }}
                            @include('components.table.sort', ['field' => 'game.date_time'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.home_score') }}
                            @include('components.table.sort', ['field' => 'game.home_score'])
                        </th>
                        <th>
                            {{ trans('cruds.game.fields.exterior_score') }}
                            @include('components.table.sort', ['field' => 'game.exterior_score'])
                        </th>
                        <th>
                            {{ trans('cruds.pronostic.fields.score_home') }}
                            @include('components.table.sort', ['field' => 'score_home'])
                        </th>
                        <th>
                            {{ trans('cruds.pronostic.fields.score_exterior') }}
                            @include('components.table.sort', ['field' => 'score_exterior'])
                        </th>
                        <th>
                            {{ trans('cruds.pronostic.fields.points') }}
                            @include('components.table.sort', ['field' => 'points'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pronostics as $pronostic)
                        <tr>
                            <td>
                                @if($pronostic->game)
                                    <span class="badge badge-relationship">{{ $pronostic->game->date_time ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($pronostic->game)
                                    {{ $pronostic->game->home_score ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($pronostic->game)
                                    {{ $pronostic->game->exterior_score ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $pronostic->score_home }}
                            </td>
                            <td>
                                {{ $pronostic->score_exterior }}
                            </td>
                            <td>
                                {{ $pronostic->points }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    {{-- @can('pronostic_show')
                                        <a class="mr-2 btn btn-sm btn-info" href="{{ route('admin.pronostics.show', $pronostic) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan --}}
                                    @can('pronostic_edit')
                                        <a class="mr-2 btn btn-sm btn-success" href="{{ route('admin.pronostics.edit', $pronostic) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('pronostic_delete')
                                        <button class="mr-2 btn btn-sm btn-rose" type="button" wire:click="confirm('delete', {{ $pronostic->id }})" wire:loading.attr="disabled">
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
            {{ $pronostics->links() }}
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
