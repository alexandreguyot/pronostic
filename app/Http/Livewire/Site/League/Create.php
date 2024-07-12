<?php

namespace App\Http\Livewire\Site\League;

use Livewire\Component;
use App\Models\League;

class Create extends Component
{
    public $title;
    public $isOpen = false;

    protected $rules = [
        'title' => 'required|string|max:255',
    ];

    public function createLeague()
    {
        $this->validate();

        League::create([
            'title' => $this->title,
        ]);
        $this->resetInputFields();
        $this->closeModal();
        $this->emit('leagueCreated');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
    }

    public function render()
    {
        return view('livewire.site.league.create');
    }
}
