<div class="">
    <div class="field_primary">
        <div class="select_field @error($model) error_field @enderror flex_start_center"
                id="{{$field}}" wire:model='{{$model}}'>
                <div class="text text_secoundary grey_text" >{{$value}}</div>
                <div class="select_options">
                    <div class="search_select">
                        <input type="search" class="" id="" placeholder="{{__("app.search")}}"
                        wire:model.live='searchSelect'>
                    </div>
                    <div class="options scroll">
                        @foreach ($collection as $item)
                            <label for="{{$item->name}}" class="option_field">
                                <input type="radio" name="city" id="{{$item->name}}" value="{{$item->id}}"
                                wire:model.debounce='{{$model}}' hidden wire:change='getValueSelect({{$item->id}})'>
                                <div class="text text_secoundary grey_text" >{{$item->name}}</div>
                            </label>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

    
    @error($model)
        <div class="text text_small danger_color mt_08" wire:transition>
            {{$message}}
        </div>
    @enderror
</div>