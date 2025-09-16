<div class="model_primary">
    <div class="content_model sm">
        <div class="header_primary flew_between_center">
            <div class="text text_primary">roles</div>
            @component('components.models.close')@endcomponent
        </div>
        <div class="hr_card"></div>
        <div class="">
            {{-- <div class="pt_10 pb_10 pl_10 pr_10">
                @component('components.models.search-model') @endcomponent
            </div> --}}
            <div class="select_md scroll">
                <label for="allRoles" class="option_item flex_between_center">
                    <div class="flex_start_center">
                        <div class="text text_secoundary grey_text"> touts des pesonnel </div>
                    </div>
                    <div class="switch">
                        <input type="radio" hidden class="hidden"
                            wire:model.stop="hasRole"
                            id="allRoles" name="hasRole" value=""/>
                        <label for="allRoles" class="switch_primary"></label>
                    </div>
                </label>
                @forelse ($collection as $item)
                    <label for="{{$item->name}}" class="option_item flex_between_center">
                        <div class="flex_start_center">
                            <div class="text text_secoundary grey_text"> {{$item->name}} </div>
                        </div>
                        <div class="switch">
                            <input type="radio" hidden class="hidden"
                                wire:model.stop="hasRole"
                                id="{{$item->name}}" name="hasRole" value="{{$item->id}}"/>
                            <label for="{{$item->name}}" class="switch_primary"></label>
                        </div>
                    </label>
                @empty
                    
                @endforelse
                
            </div>
        </div>
        <div class="hr_card"></div>
        <div class="footer_primary grid_1">
            <button class="btn btn_primary" type="button" wire:click='updateHasRole'>
                <div class="text text_small light_text">
                    {{__("app.save_changes")}}
                </div>
            </button>
        </div>
    </div>
</div>