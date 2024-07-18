<?php

namespace App\Http\Livewire\Pronostic;

use App\Models\Game;
use App\Models\Pronostic;
use App\Models\User;
use Livewire\Component;

class Create extends Component
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
        return view('livewire.pronostic.create');
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
            'pronostic.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
          'pronostic.score_home' => [
                'integer',
                'min:0',
                'max:999',
                'nullable',
            ],
            'pronostic.score_exterior' => [
                'integer',
                'min:0',
                'max:999',
                'nullable',
            ],
            'pronostic.points' => [
                'integer',
                'min:0',
                'max:999',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['game'] = Game::pluck('date_time', 'id')->toArray();
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
