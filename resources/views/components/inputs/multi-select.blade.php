<div class="w-full block gap-2">
    <span class="font-bold">{{ $label }}</span>
        <select class="select2-field w-full" name="{{ $name }}[]" id="select2-{{ $id }} {{$id}}" wire:model="{{ $model }}" multiple="multiple">
            @if($isGrouped)
                @foreach($options as $group => $optionGroup)
                <optgroup label="{{ ucfirst(str_replace('_', ' ', $group)) }}">
                    @foreach($optionGroup as $option)
                    <option value="{{ $option['character_name'] }}">{{ $option['character_name']}}</option>
                    @endforeach
                </optgroup>
                @endforeach
            @else
                @foreach($options as $option)
                <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                @endforeach
            @endif
        </select>
</div>