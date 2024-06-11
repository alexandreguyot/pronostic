<?php

namespace App\Http\Livewire\Competition;

use App\Models\Competition;
use Livewire\Component;

class Create extends Component
{
    public Competition $competition;

    public function mount(Competition $competition)
    {
        $this->competition = $competition;
    }

    public function render()
    {
        return view('livewire.competition.create');
    }

    public function submit()
    {
        $this->validate();

        $this->competition->save();

        return redirect()->route('admin.competitions.index');
    }

    protected function rules(): array
    {
        return [
            'competition.title' => [
                'string',
                'required',
            ],
        ];
    }
}
