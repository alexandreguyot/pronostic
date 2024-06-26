<?php

namespace App\Http\Livewire\Pronostic;

use App\Models\Game;
use App\Models\Pronostic;
use Livewire\Component;

class Edit extends Component
{
    public Pronostic $pronostic;

    public array $listsForFields = [];

    public function mount(Pronostic $pronostic)
    {
        $this->pronostic = $pronostic;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.pronostic.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->pronostic->save();

        return redirect()->route('admin.pronostics.index');
    }

    protected function rules(): array
    {
        return [
            'pronostic.game_id' => [
                'integer',
                'exists:games,id',
                'required',
            ],
            'pronostic.score_home' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'pronostic.score_exterior' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'pronostic.points' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['game'] = Game::pluck('date_time', 'id')->toArray();
    }
}
