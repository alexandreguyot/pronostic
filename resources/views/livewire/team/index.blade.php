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
                            {{ trans('cruds.team.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.sport') }}
                            @include('components.table.sort', ['field' => 'sport'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.group') }}
                            @include('components.table.sort', ['field' => 'group'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>
                                {{ $team->name }}
                            </td>
                            <td>
                                @if($team->sport)
                                    <span class="badge badge-relationship">{{ $team->sport->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $team->group }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('team_show')
                                        <a class="mr-2 btn btn-sm btn-info" href="{{ route('admin.teams.show', $team) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('team_edit')
                                        <a class="mr-2 btn btn-sm btn-success" href="{{ route('admin.teams.edit', $team) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('team_delete')
                                        <button class="mr-2 btn btn-sm btn-rose" type="button" wire:click="confirm('delete', {{ $team->id }})" wire:loading.attr="disabled">
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
            {{ $teams->links() }}
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
