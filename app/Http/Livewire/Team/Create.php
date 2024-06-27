<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use App\Models\Sport;
use Livewire\Component;

class Create extends Component
{
    public Team $team;

    public array $listsForFields = [];

    public function mount(Team $team)
    {
        $this->initListsForFields();
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.team.create');
    }

    public function submit()
    {
        $this->validate();

        $this->team->save();

        return redirect()->route('admin.teams.index');
    }

    protected function rules(): array
    {
        return [
            'team.name' => [
                'string',
                'required',
            ],
            'team.sport_id' => [
                'integer',
                'exists:sports,id',
                'required',
            ],

            'team.group' => [
                'string',
                'nullable',
            ],
            'team.icon' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['sport'] = Sport::pluck('title', 'id')->toArray();
    }
}
