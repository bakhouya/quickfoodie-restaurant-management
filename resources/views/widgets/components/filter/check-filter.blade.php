<label for="{{$value}}" class="flex_between_center item_body_filter">
    <input type="radio" name="{{$model}}" id="{{$value}}" value="{{$value}}" wire:model.live='{{$model}}' hidden>
    <div class="text text_secoundary grey_text">{{$text}}</div>
</label>