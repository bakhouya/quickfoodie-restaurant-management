@for ($i = 1; $i < 10; $i++)
    <label for="country-{{$i}}" class="option_item flex_between_center">
        <div class="flex_start_center">
            <div class="text text_secoundary grey_text"> {{Str::random(10)}} </div>
        </div>
        @component('components.form.check' , [
            "field" => "country-".$i."" ,
            "type" => "checkbox" ,
            "model" => "option" 
        ])@endcomponent
    </label>
@endfor
