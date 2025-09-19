<div>
    <div id="search-and-filter" class="grid grid-cols-3 gap-3 p-2">
        <input type="text" wire:model.blur="searchText" name="search_text" id="search_text" placeholder="Search for a card"/>

        <x-inputs.multi-select label="Feature" name="feature_filter" id="feature_filter" model="featureFilter" :options="$featureOptions"/>

        <x-inputs.multi-select label="Rarity" name="rarity_filter" id="rarity_filter" model="rarityFilter" :options="$rarityOptions"/>        

        <x-inputs.multi-select label="Character" name="character_filter" id="character_filter" model="characterFilter" :options="$characterOptionsByGroup" :isGrouped="true"/>

        <x-inputs.multi-select label="Type" name="type_filter" id="type_filter" model="typeFilter" :options="$typeOptions"/>
        
        <x-inputs.multi-select label="Level" name="level_filter" id="level_filter" model="levelFilter" :options="$levelOptions"/>

        <x-inputs.multi-select label="Scene Round" name="round_filter" id="round_filter" model="roundFilter" :options="$roundOptions"/>
    </div>

    <div wire:text.live="activeFilters">No active filters.</div>

    <div id="card-results">
        @if(empty($cardResults))
        No cards found.
        @else
        <div class="flex-1 max-h-[calc(100vh-10rem)] overflow-y-scroll grid grid-cols-3 bg-green-200 gap-2 lg:gap-3 w-full">
        @foreach($cardResults as $card)
            <div class="flex w-34 lg:w-44 h-34 lg:h-44 bg-green-300 dark:bg-green-600" data-card-id="{{ $card->id }}">
                <img src="{{ $card->thumbnail_url }}" alt="{{ $card->number }}" title="{{ $card->title }}" class="m-auto w-auto h-auto max-w-34 lg:max-w-44 max-h-34 lg:max-h-44"/>
            </div>
        @endforeach
        </div>
        @endif
    </div>
</div>