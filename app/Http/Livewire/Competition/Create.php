<?php

namespace App\Http\Livewire\Competition;

use App\Models\Competition;
use App\Models\Sport;
use Livewire\Component;

class Create extends Component
{
    public array $sport = [];

    public Competition $competition;

    public array $listsForFields = [];

    public function mount(Competition $competition)
    {
        $this->competition = $competition;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.competition.create');
    }

    public function submit()
    {
        $this->validate();

        $this->competition->save();
        $this->competition->sport()->sync($this->sport);

        return redirect()->route('admin.competitions.index');
    }

    protected function rules(): array
    {
        return [
            'competition.title' => [
                'string',
                'required',
            ],
            'sport' => [
                'required',
                'array',
            ],
            'sport.*.id' => [
                'integer',
                'exists:sports,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['sport'] = Sport::pluck('title', 'id')->toArray();
    }
}
