<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
  use WithPagination;

  public $active = true;
  public $search;
  public $sortField;
  public $sortAsc = true;
  protected $queryString = ['search' => ['except' => ''], 'active', 'sortField', 'sortAsc'];

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function updatingActive()
  {
    $this->resetPage();
  }

  public function sortBy($field)
  {
    if ($this->sortField === $field) {
      $this->sortAsc = !$this->sortAsc;
    } else {
      $this->sortAsc = true;
    }

    $this->sortField = $field;
  }

  public function render()
  {
    $query = User::filter([
      'search' => $this->search,
      'active' => $this->active,
      'sortField' => $this->sortField,
      'sortAsc' => $this->sortAsc,
    ]);

    return view('livewire.data-table', [
      'users' => $query->paginate(10),
    ]);
  }
}
