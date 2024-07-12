<?php

namespace App\Http\Livewire\Site\League;

use Livewire\Component;
use App\Models\League;

class Join extends Component
{

    public $token;
    public $isOpen = false;

    protected $rules = [
        'token' => 'required|string|max:255',
    ];

    public function joinLeague()
    {
        $this->validate();

        $league = League::where('token', $this->token)->first();

        if ($league) {
            // Logic to join the league, e.g., associating the user with the league
            $this->resetInputFields();
            $this->closeModal();
            $this->emit('leagueJoined');
        } else {
            $this->addError('token', 'Invalid token');
        }
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
        $this->token = '';
    }
    public function render()
    {
        return view('livewire.site.league.join');
    }
}
