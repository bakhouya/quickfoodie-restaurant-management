<div class="">
    <div class="field_primary">
        <div class="field_input @error($model) error_field @enderror">
            <input type="{{$type}}" placeholder="{{$field}}" id="{{$field}}" wire:model='{{$model}}'>
        </div>
    </div>
    @error($model)
        <div class="text text_small danger_color mt_08" wire:transition>
            {{$message}}
        </div>
    @enderror
</div>
{{-- error_field --}}