<div class="flex space-x-4 w-full">
    <input type="text" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" wire:model="pronostic.score_home" />
    @if($pronostic->game->exterior_team_id)
        <input type="text" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white rounded-lg w-16 h-9 input-pronostic" wire:model="pronostic.score_exterior" />
    @endif
</div>
