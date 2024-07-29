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
    public string $competition = '';
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
            ],
            'competition' => [
                'string',
                'nullable',
            ],
            'sport' => [
                'array',
            ],
            'sport.*.id' => [
                'integer',
                'exists:sports,id',
            ]
        ];
    }

    public function updatedCompetition($value) {
        if ($value) {
            // $this->listsForFields['sports'] = Competition::whereId($value)->first()->sport->pluck('title', 'id')->toArray();
        }
    }

    protected function initListsForFields(): void
    {
        $users = User::all();

        $this->listsForFields['user'] = $users->mapWithKeys(function ($user) {
            return [$user->id => $user->fullname];
        })->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['sports'] = Competition::whereId(1)->first()->sport->pluck('title', 'id')->toArray();
    }
}
