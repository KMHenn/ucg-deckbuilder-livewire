<div id="search-and-filter" class="grid grid-cols-1 gap-3">
    <input type="text" wire:blur name="search_text" id="search_text" placeholder="Search for a card"/>

    <select name="feature_filter" id="featureFilter">
        @foreach($featureOptions as $feature)
        <option value="{{ $feature }}">{{ ucfirst(str_replace('_', ' ', $feature)) }}</option>
        @endforeach
    </select>

    <select name="type_filter" id="type_filter">
        @foreach($typeOptions as $type)
        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
        @endforeach
    </select>
</div>
