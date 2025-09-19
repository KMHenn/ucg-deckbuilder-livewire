<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Card;

class CardSearch extends Component
{
    public array $featureOptions;
    public array $typeOptions;
    public array $rarityOptions;
    public array $levelOptions;
    public array $roundOptions;
    public array $characterOptionsByGroup;

    public ?string $searchText = null;
    public array $featureFilter = [];
    public ?string $typeFilter = null;
    public array $rarityFilter = [];
    public ?string $levelFilter = null;
    public array $roundFilter = [];
    public ?string $characterFilter = null;

    public $cardResults;
    public string $activeFilters = '';

    public function mount(){
        $this->featureOptions = Card::distinct('feature')->pluck('feature')->toArray();
        $this->typeOptions = Card::distinct('type')->whereNotNull('type')->orderBy('type')->pluck('type')->toArray();
        $this->rarityOptions = Card::distinct('rarity')->orderBy('rarity')->pluck('rarity')->toArray();
        $this->levelOptions = Card::distinct('level')->whereNotNull('level')->orderBy('level')->pluck('level')->toArray();
        $this->roundOptions = Card::distinct('round')->whereNotNull('round')->orderBy('round')->pluck('round')->toArray();
        $this->characterOptionsByGroup = Card::distinct('character_name')->where('character_name', '!=', '-')->orderBy('character_name')->select('feature', 'character_name')->get()->groupBy('feature')->toArray();
    }

    public function render()
    {
        return view('livewire.card-search');
    }

    public function updated(string $field, string $value){
        if(str_contains($field, 'Filter')){
            // Filter update
        }

        $this->filterCards();
    }

    private function filterCards(){
        $query = Card::query();
        $filters = [];

        if(!is_null($this->featureFilter)){
            $filters[] = 'Feature: ' . $this->featureFilter;
            $query->where('feature', $this->featureFilter);
        }

        if(!is_null($this->typeFilter)){
            $filters[] = 'Type: ' . $this->typeFilter;
            $query->where('type', $this->typeFilter);
        }

        if(!is_null($this->rarityFilter)){
            $query->where('rarity', $this->rarityFilter);
        }

        if(!is_null($this->levelFilter)){
            $query->where('level', $this->levelFilter);
        }

        if(!empty($this->roundFilter)){
            $query->whereIn('round', implode(',', $this->roundFilter));
        }

        if(!empty($this->characterFilter)){
            $query->whereIn('character_name', implode(',', $this->characterFilter));
        }

        if(!is_null($this->searchText)){
            $query->where('name', 'like', '%' . $this->searchText . '%');
        }

        $this->activeFilters = implode(' | ', $filters);
        $this->cardResults = $query->get();
    }
}
