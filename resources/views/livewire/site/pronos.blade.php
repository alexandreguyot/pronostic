<div class="flex space-x-4 w-full items-center">
    <input type="number" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" wire:model="pronostic.score_home" />
    <span class="font-bold m-2"> - </span>
    @if($pronostic->game->exterior_team_id)
        <input type="number" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" wire:model="pronostic.score_exterior" />
    @endif
</div>
