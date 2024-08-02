<?php

namespace App\Http\Livewire\Pronostic;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Pronostic;
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

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
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
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Pronostic())->orderable;
    }

    public function render()
    {
        $query = Pronostic::with(['game', 'user', 'game.sport'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $pronostics = $query->paginate($this->perPage);

        return view('livewire.pronostic.index', compact('pronostics', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('pronostic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Pronostic::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Pronostic $pronostic)
    {
        abort_if(Gate::denies('pronostic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pronostic->delete();
    }
}
