<?php

namespace App\Http\Livewire\League;

use App\Models\League;
use App\Models\User;
use App\Models\Competition;
use Livewire\Component;

class Edit extends Component
{
    public array $user = [];
    public array $competition = [];

    public array $listsForFields = [];

    public League $league;

    public function mount(League $league)
    {
        $this->league = $league;
        $this->user         = $this->league->user()->pluck('id')->toArray();
        $this->competition         = $this->league->competition()->pluck('id')->toArray();
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
        $this->league->user()->sync($this->user);
        $this->league->competition()->sync($this->competition);

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
            'competition.*.id' => [
                'integer',
                'exists:competitions,id',
            ],

        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
    }
}
