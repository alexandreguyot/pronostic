<?php

namespace App\Http\Livewire\Championship;

use App\Models\Championship;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $user = [];

    public array $listsForFields = [];

    public Championship $championship;

    public function mount(Championship $championship)
    {
        $this->championship = $championship;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.championship.create');
    }

    public function submit()
    {
        $this->validate();

        $this->championship->save();
        $this->championship->user()->sync($this->user);

        return redirect()->route('admin.championships.index');
    }

    protected function rules(): array
    {
        return [
            'championship.title' => [
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
    }
}
