@foreach ($roles as $role)
    <label for="{{$role->name}}" class="option_item flex_between_center">
        <div class="">
            <div class="text text_secoundary"> {{$role->name}}</div>
            <div class="text text_small clamp_1">{{$role->description}} </div>
        </div>
        <div class="switch">
            <input type="radio" hidden class="hidden"
                wire:model.stop="role" name="role"
                id="{{$role->name}}" value="{{$role->name}}"/>
            <label for="{{$role->name}}" class="switch_primary"></label>
        </div>
    </label>
@endforeach