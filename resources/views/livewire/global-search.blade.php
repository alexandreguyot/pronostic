<div class="relative flex flex-wrap items-stretch w-full">
    <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center bg-transparent rounded text-blueGray-300">
        <i class="fas fa-search"></i>
    </span>

    @if(count($results))
        <span class="absolute right-0 z-10 items-center justify-center w-8 h-full py-3 pr-3 text-base font-normal leading-snug text-center bg-transparent rounded cursor-pointer text-rose-300" wire:click="resetForm">
            <i class="fas fa-times"></i>
        </span>
    @endif

    <input type="text" placeholder="Recherche" wire:model.debounce.300ms="search" class="relative w-full px-3 py-3 pl-10 text-sm bg-white border-0 rounded shadow outline-none placeholder-blueGray-300 text-blueGray-600 focus:outline-none focus:ring" />

    <div class="absolute right-0 z-20 w-full mt-12 overflow-x-hidden overflow-y-auto bg-white rounded shadow-lg max-h-96">
        @foreach($results as $group => $entries)
            <div class="px-3 py-2 text-xs font-bold tracking-wider text-indigo-600 uppercase bg-indigo-100">
                {{ $group }}
            </div>

            <ul>
                @foreach($entries as $entry)
                    <li class="flex items-center block px-3 py-2 font-normal no-underline cursor-pointer hover:bg-blueGray-100">
                        <a href="{{ $entry['linkTo'] }}">
                            @foreach($entry['fields'] as $name => $value)
                                <div class="text-sm text-blueGray-700">{{ $name }}: {{ $value }}</div>
                            @endforeach
                        </a>
                    </li>
                @endforeach
            </ul>

        @endforeach
    </div>
</div>
