<label for="{{$field}}" class="box_option_settings flex_between_center">
    <div class="">
        <div class="text text_secoundary">{{$title}}</div>
        <div class="text text_small clamp_1">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
    </div>
    @component('components.form.check', [
                "type" => "checkbox",
                "field" => $field,
                "model" => "data.$field",]) 
    @endcomponent
</label>