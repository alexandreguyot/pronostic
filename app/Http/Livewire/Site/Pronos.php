<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Game;
use App\Models\Pronostic;
use App\Models\User;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Pronos extends Component
{
    use LivewireAlert;

    public Pronostic $pronostic;
    public Game $game;
    public User $user;

    public array $listsForFields = [];

    public function mount(Pronostic $pronostic, Game $game, User $user)
    {
        $this->pronostic = $pronostic;
    }

    public function render()
    {
        return view('livewire.site.pronos');
    }

    public function submit()
    {
        $this->validate();

        $this->pronostic->save();

        return redirect()->route('pronostics');
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
                'min:-2147483648',
                'max:2147483647',
                'nullable',
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
}
