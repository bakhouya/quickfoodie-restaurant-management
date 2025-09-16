@foreach ($collection as $collect)
    <label for="{{$collect->name}}" class="option_item flex_between_center">
        <div class="flex_start_center gap_1">
            <div class="avatar_primary sm">
                <img src="{{asset("storage/". $collect->image)}}">
            </div>
            <div class="">
                <div class="text text_secoundary grey_text"> {{$collect->name}}</div>
                {{-- <div class="text text_small clamp_1">{{Str::limit($collect->description, 20)}}</div> --}}
            </div>
        </div>
        <div class="switch">
            <input type="radio" hidden class="hidden"
                wire:model.stop="data.category_id"
                id="{{$collect->name}}" name="category" value="{{$collect->id}}"/>
            <label for="{{$collect->name}}" class="switch_primary"></label>
        </div>
    </label>
@endforeach