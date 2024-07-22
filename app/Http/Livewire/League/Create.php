<?php

namespace App\Http\Livewire\League;

use App\Models\League;
use App\Models\User;
use App\Models\Sport;
use App\Models\Competition;
use Livewire\Component;

class Create extends Component
{
    public array $user = [];
    public array $competition = [];
    public array $sport = [];

    public array $listsForFields = [];

    public League $league;

    public function mount(League $league)
    {
        $this->league = $league;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.league.create');
    }

    public function submit()
    {
        $this->validate();

        $this->league->save();
        $this->league->competitions()->sync($this->competition);
        $this->league->sports()->sync($this->sport);
        $this->league->users()->sync($this->user);

        return redirect()->route('admin.leagues.index');
    }

    protected function rules(): array
    {
        return [
            'league.title' => [
                'string',
                'required',
            ],
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ]
        ];
    }

    public function updatedLeagueCompetitionId($value) {
        $this->league->competition_id = $value;
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['sport'] = [];
    }
}
