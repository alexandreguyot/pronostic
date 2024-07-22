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
        $this->user         = $this->league->users()->pluck('id')->toArray();
        $this->competition         = $this->league->competitions()->pluck('id')->toArray();
        $this->sport         = $this->league->sports()->pluck('id')->toArray();
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
        $this->league->competitions()->sync($this->competition);
        $this->league->sports()->sync($this->sport);
        $this->league->users()->sync($this->user);

        return redirect()->route('admin.leagues.index');
    }

    public function updatedCompetition($value) {
        $this->listsForFields['sport'] = Competition::where('id', $value)->first()->sport()->pluck('title', 'id')->toArray();
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
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['sport'] =  Sport::pluck('title', 'id')->toArray();
    }
}
