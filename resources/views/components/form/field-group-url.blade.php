<div class="">
    <div class="field_primary">
        <div class="field_input field_group @error($model) error_field @enderror">
            <input type="url" placeholder="{{$field}}" wire:model='{{$model}}'>
            <div class="group_team">
                <div class="text text_small">
                    <svg class="svg_stroke" width="22" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M37.9292 22.3151L24.46 35.7843C20.6336 39.6107 14.2051 39.6107 10.3786 35.7843C6.55217 31.9578 6.55217 25.5293 10.3786 21.7029L22.3172 9.76429C25.0723 7.00923 29.3579 7.00923 32.113 9.76429C34.868 12.5193 34.868 16.805 32.113 19.5601L21.0928 30.4272C19.5622 31.9578 17.1132 31.9578 15.7357 30.4272C14.2051 28.8966 14.2051 26.4477 15.7357 25.0702L24.9192 15.8866" stroke="" stroke-width="2.75506" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="flex_start_center gap_05 mt_08">
        <div class="text text_small">exam :</div>
        <div class="worning_text"> https://domain.com/------ </div>
    </div>
    @error($model)
        <div class="text text_small danger_color mt_08">
            {{$message}}
        </div>
    @enderror
    {{-- error_field --}}
</div>