<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
  public $search;
  public $searchResult = [];

  public function updatedSearch($newValue)
  {
    $response = Http::get('https://itunes.apple.com/search?term='.$newValue.'&limit=25');
    $this->searchResult = $response->json()['results'];
  }

  public function render()
  {
    return view('livewire.search-dropdown');
  }
}
