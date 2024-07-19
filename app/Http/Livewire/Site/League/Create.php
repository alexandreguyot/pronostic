<?php

namespace App\Http\Livewire\Site\League;

use Livewire\Component;
use App\Models\League;
use App\Models\User;
use App\Models\Competition;
use App\Models\Sport;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Create extends Component
{
    use LivewireAlert;

    public $title;
    public $isOpen = false;
    public array $user = [];
    public $competition = "";
    public array $sport = [];

    public array $listsForFields = [];

    public League $league;

    public function mount(League $league)
    {
        $this->league = $league;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.site.league.create');
    }

    public function submit()
    {
        $this->validate();

        $this->league->save();
        $this->league->competition()->sync($this->competition);
        $this->league->sport()->sync($this->sport);
        $this->league->user()->sync($this->user);

        $this->alert('success', 'La ligue a été créée');
    }

    protected function rules(): array
    {
        return [
            'league.title' => [
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
            'league.competition_id' => [
                'integer',
                'exists:competitions,id',
                'required',
            ],
            'league.sport_id' => [
                'integer',
                'exists:sports,id',
                'required',
            ],
        ];
    }

    public function updatedCompetition($value) {
        $this->listsForFields['sport'] = Competition::where('id', $value)->first()->sport()->pluck('title', 'id')->toArray();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['competition'] = Competition::pluck('title', 'id')->toArray();
        $this->listsForFields['sport'] = [];
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
}
