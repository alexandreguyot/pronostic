<?php

namespace App\Http\Livewire\Game;

use App\Models\Competition;
use App\Models\Game;
use App\Models\Sport;
use App\Models\Team;
use Livewire\Component;

class Edit extends Component
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
        return view('livewire.game.edit');
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
        $this->listsForFields['home_team']     = Team::whereHas('sport', function ($query) {
            $query->where('id', $this->game->sport_id);
        })->orderBy('name')->pluck('name', 'id')->toArray();
        $this->listsForFields['exterior_team'] = Team::whereHas('sport', function ($query) {
            $query->where('id', $this->game->sport_id);
        })->orderBy('name')->pluck('name', 'id')->toArray();
        $this->listsForFields['sport']         = Sport::pluck('title', 'id')->toArray();
    }

    public function updatedGameSportId($value) {
        $this->listsForFields['home_team'] = Team::whereHas('sport', function ($query) use ($value) {
            $query->where('id', $value);
        })->orderBy('name')->pluck('name', 'id')->toArray();
        $this->listsForFields['exterior_team'] = Team::whereHas('sport', function ($query) use ($value) {
            $query->where('id', $value);
        })->orderBy('name')->pluck('name', 'id')->toArray();
    }
}
