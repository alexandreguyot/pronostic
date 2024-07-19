<?php

namespace App\Http\Livewire\League;

use App\Models\League;
use App\Models\User;
use App\Models\Sport;
use App\Models\Competition;
use Livewire\Component;

class Edit extends Component
{
    public array $user = [];
    public array $competition = [];
    public array $sport = [];

    public array $listsForFields = [];

    public League $league;

    public function mount(League $league)
    {
        $this->league = $league;
        $this->user         = $this->league->user()->pluck('id')->toArray();
        $this->competition         = $this->league->competition()->pluck('id')->toArray();
        $this->sport         = $this->league->sport()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.league.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->league->save();
        $this->league->competition()->sync($this->competition);
        $this->league->sport()->sync($this->sport);
        $this->league->user()->sync($this->user);

        return redirect()->route('admin.leagues.index');
    }

    public function updatedLeagueCompetitionId($value) {
        $this->league->competition_id = $value;
        $this->listsForFields['sport'] = Competition::where('id', $value)->first()->sport();
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
            ],
            'league.competition_id' => [
                'integer',
                'exists:competitions,id',
                'required',
            ],
            'league.sport_id' => [
                'integer',
                'exists:sports,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['sport'] =  Sport::pluck('title', 'id')->toArray();
    }
}
