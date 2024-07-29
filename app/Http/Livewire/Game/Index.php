<?php

namespace App\Http\Livewire\Game;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Game;
use App\Models\Sport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';
    public string $date = '';
    public array $sports = [];

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'date' => [
            'except' => '',
        ],
        'sport' => [
            'except' => '',
        ],
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'date_time';
        $this->sortDirection     = 'asc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Game())->orderable;
        $this->listsForFields['sports'] = Sport::all()->pluck('title', 'id')->toArray();
    }

    public function render()
    {
        $query = Game::with(['competition', 'homeTeam', 'exteriorTeam', 'sport'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $query->when($this->date, function($query) {
            $date = str_replace("/", "-", $this->date);
            $date = explode('-', $date);
            $date = array_reverse($date);
            $date = implode('-', $date);
            $query->where('date', 'like', '%'.$date.'%');
        })
        ->when($this->sports, function($query) {
            return $query->whereHas('sport', function($query) {
                return $query->whereIn('sport.id', $this->sports);
            });
        });;

        $games = $query->paginate($this->perPage);

        return view('livewire.game.index', compact('games', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('game_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Game::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Game $game)
    {
        abort_if(Gate::denies('game_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $game->delete();
    }
}
