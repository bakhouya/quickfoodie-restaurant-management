<div class="switch">
    <input type="{{$type}}" hidden class="hidden"
        wire:model.stop="{{$model}}"
        id="{{$field}}" name="{{$field}}"/>
    <label for="{{$field}}" class="switch_primary"></label>
</div>