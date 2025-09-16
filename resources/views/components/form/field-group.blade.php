<div class="">
    <div class="field_primary">
        <div class="field_input field_group @error($model) error_field @enderror"">
            <input type="{{$type}}" placeholder="{{$field}}" wire:model='{{$model}}'>
            <div class="group_team">
                <div class="text text_small">MAD</div>
            </div>
        </div>
    </div>
    @error($model)
        <div class="text text_small danger_color mt_08">
            {{$message}}
        </div>
    @enderror
    {{-- error_field --}}
</div>