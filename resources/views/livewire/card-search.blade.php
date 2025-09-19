<div>
    <div id="search-and-filter" class="grid grid-cols-3 gap-3 p-2">
        <input type="text" wire:model.blur="searchText" name="search_text" id="search_text" placeholder="Search for a card"/>


        <select name="feature_filter" id="featureFilter" wire:model.change="featureFilter">
            <option selected value="">-- Feature --</option>
            @foreach($featureOptions as $feature)
            <option value="{{ $feature }}">{{ ucfirst(str_replace('_', ' ', $feature)) }}</option>
            @endforeach
        </select>

        <select name="rarity_filter" id="rarity_filter" wire:model.change="rarityFilter">
            <option selected value="">-- Rarity --</option>
            @foreach($rarityOptions as $rarity)
            <option value="{{ $rarity }}">{{ ucfirst($rarity) }}</option>
            @endforeach
        </select>

        <select name="character_filter" id="character_filter" wire:model.change="characterFilter">
            <option selected value="">-- Character --</option>
            @foreach($characterOptionsByGroup as $group => $characterOptions)
            <optgroup label="{{ $group }}">
                @foreach($characterOptions as $characterOption)
                <option value="{{ $characterOption['character_name'] }}">{{ $characterOption['character_name']}}</option>
                @endforeach
            </optgroup>
            @endforeach
        </select>

        
        <select name="type_filter" id="type_filter" wire:model.change="typeFilter">
            <option selected value="">-- Type --</option>
            @foreach($typeOptions as $type)
            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
            @endforeach
        </select>

        <select name="level_filter" id="level_filter" wire:model.change="levelFilter">
            <option selected value="">-- Level --</option>
            @foreach($levelOptions as $level)
            <option value="{{ $level }}">Level {{ ucfirst($level) }}</option>
            @endforeach
        </select>


        <select name="round_filter" id="round_filter" wire:model.change="roundFilter">
            <option value="">-- Scene Round --</option>
            @foreach($roundOptions as $round)
            <option selected="{{ $round === $roundFilter ? 'selected' : ''}}" value="{{ $round }}">Round {{ $round }}</option>
            @endforeach
        </select>
    </div>

    <div wire:text.live="activeFilters"></div>

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