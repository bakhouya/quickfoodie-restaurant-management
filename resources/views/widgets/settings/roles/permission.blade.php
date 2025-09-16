@foreach ($permissions as $permission)
    <label for="{{$permission->name}}" class="option_item flex_between_center">
        <div class="">
            <div class="text text_secoundary grey_text"> {{$permission->name}}</div>
        </div>
        <div class="switch">
            <input type="checkbox" hidden class="hidden"
                wire:model.stop="permissionsData" name="permissionsData[]"
                id="{{$permission->name}}" value="{{$permission->name}}"/>
            <label for="{{$permission->name}}" class="switch_primary"></label>
        </div>
    </label>
@endforeach