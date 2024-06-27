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
                            {{ trans('cruds.league.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.league.fields.competition') }}
                        </th>
                        <th>
                            {{ trans('cruds.league.fields.sport') }}
                        </th>
                        <th>
                            {{ trans('cruds.league.fields.user') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leagues as $league)
                        <tr>
                            <td>
                                {{ $league->title }}
                            </td>
                            <td>
                                @if($league->competition)
                                    <span class="badge badge-relationship">{{ $league->competition->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($league->sport)
                                    <span class="badge badge-relationship">{{ $league->sport->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($league->user as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('championship_show')
                                        <a class="mr-2 btn btn-sm btn-info" href="{{ route('admin.leagues.show', $league) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('championship_edit')
                                        <a class="mr-2 btn btn-sm btn-success" href="{{ route('admin.leagues.edit', $league) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('championship_delete')
                                        <button class="mr-2 btn btn-sm btn-rose" type="button" wire:click="confirm('delete', {{ $league->id }})" wire:loading.attr="disabled">
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
            {{ $leagues->links() }}
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
