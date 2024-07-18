<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\User;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class Profile extends Component
{
    use LivewireAlert;

    public User $user;

    public function mount(User $user) {
        $this->user = $user;
    }

    public function submit()
    {
        $this->validate();

        $this->user->save();

        $this->alert('success', 'Profil mis à jour');
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.firstname' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.site.profile',);
    }
}
