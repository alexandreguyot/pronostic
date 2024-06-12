<?php

namespace App\Http\Livewire\Sport;

use App\Models\Sport;
use Livewire\Component;

class Edit extends Component
{
    public Sport $sport;

    public function mount(Sport $sport)
    {
        $this->sport = $sport;
    }

    public function render()
    {
        return view('livewire.sport.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->sport->save();

        return redirect()->route('admin.sports.index');
    }

    protected function rules(): array
    {
        return [
            'sport.title' => [
                'string',
                'required',
            ],
        ];
    }
}
