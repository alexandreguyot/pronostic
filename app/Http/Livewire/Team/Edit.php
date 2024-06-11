<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use Livewire\Component;

class Edit extends Component
{
    public Team $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.team.edit');
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
        ];
    }
}
