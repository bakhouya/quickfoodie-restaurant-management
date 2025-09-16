@foreach ($collection as $collect)
    <label for="{{$collect->name}}" class="option_item flex_between_center">
        <div class="flex_start_center gap_1">
            <div class="avatar_primary sm">
                <img src="{{asset("assets/media/png/medama.png")}}" alt="">
            </div>
            <div class="">
                <div class="text text_secoundary"> {{$collect->name}}</div>
                <div class="text text_small clamp_1">{{$collect->address}} </div>
            </div>
        </div>
        <div class="switch">
            <input type="radio" hidden class="hidden"
                wire:model.stop="data.branch_id"
                id="{{$collect->name}}" value="{{$collect->id}}"/>
            <label for="{{$collect->name}}" class="switch_primary"></label>
        </div>
    </label>
@endforeach