<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Card;

class CardSearch extends Component
{
    public array $featureOptions;
    public array $typeOptions;
    public array $rarityOptions;

    public string $searchName;
    public $cardResults;

    public function mount(){
        $this->featureOptions = Card::distinct('feature')->pluck('feature')->toArray();
        $this->typeOptions = Card::distinct('type')->orderBy('type')->pluck('type')->toArray();
        $this->rarityOptions = Card::distinct('rarity')->orderBy('rarity')->pluck('rarity')->toArray();
    }

    public function render()
    {
        return view('livewire.card-search');
    }

    public function updatedSearchName(string $searchText){
        // $this->cardResults = Card::
    }
}
