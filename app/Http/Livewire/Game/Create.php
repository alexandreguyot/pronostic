<?php

namespace App\Http\Livewire\Game;

use App\Models\Competition;
use App\Models\Game;
use App\Models\Sport;
use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public Game $game;

    public array $listsForFields = [];

    public function mount(Game $game)
    {
        $this->game = $game;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.game.create');
    }

    public function submit()
    {
        $this->validate();

        $this->game->save();

        return redirect()->route('admin.games.index');
    }

    protected function rules(): array
    {
        return [
            'game.competition_id' => [
                'integer',
                'exists:competitions,id',
                'required',
            ],
            'game.tour' => [
                'string',
                'nullable',
            ],
            'game.date_time' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'game.home_team_id' => [
                'integer',
                'exists:teams,id',
                'required',
            ],
            'game.home_score' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'game.exterior_team_id' => [
                'integer',
                'exists:teams,id',
                'nullable',
            ],
            'game.exterior_score' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'game.sport_id' => [
                'integer',
                'exists:sports,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['competition']   = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['home_team']     = Team::pluck('name', 'id')->toArray();
        $this->listsForFields['exterior_team'] = Team::pluck('name', 'id')->toArray();
        $this->listsForFields['sport']         = Sport::pluck('title', 'id')->toArray();
    }
}
