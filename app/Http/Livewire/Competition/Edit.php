<?php

namespace App\Http\Livewire\Competition;

use App\Models\Competition;
use App\Models\Sport;
use Livewire\Component;

class Edit extends Component
{
    public Competition $competition;

    public array $listsForFields = [];

    public function mount(Competition $competition)
    {
        $this->competition = $competition;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.competition.edit');
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
            'competition.sport_id' => [
                'integer',
                'exists:sports,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['sport'] = Sport::pluck('title', 'id')->toArray();
    }
}
