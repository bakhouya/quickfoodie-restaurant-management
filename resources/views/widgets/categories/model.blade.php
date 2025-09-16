<div class="model_primary">
    <div class="content_model">

        <div class="fixed" wire:loading wire:target='create'>
            @component('components.leaders.leader-1')@endcomponent
        </div>

        <div class="header_model flex_between_center">
            @if ($type == 'edit')
                <div class="text headline_primary"> {{__("app.edit_item")}} </div>
            @else
                <div class="text headline_primary">{{__("app.add_item")}}</div>
            @endif
            <button class="" type="button" wire:click='close'>
                <div class="text text_secoundary">X</div>
            </button>
        </div>

        <div class="body_model">
            <div class="form_model scroll">
                @component('widgets.categories.tabs', ["locale" => $locale])@endcomponent
                <div class="grid_1 gap_primary">
                    @if ($image != null)
                        <div class="priv_1" wire:animation>
                            <div class="item_file">
                                <img src="{{$image->temporaryUrl()}}" alt="">
                                <button class="btn_remove" type="button" wire:click="removeImage">
                                    <text class="text_small">X</text>
                                </button>
                            </div>
                        </div>
                    @else
                        @component('components.form.field-file', [
                                "type" => "text",
                                "field" => "image",
                                "multi" => "false",
                                "model" => "data.image",
                        ])@endcomponent
                    @endif  
                    <div class="center" wire:loading wire:target='data.image'>
                        @component('components.leaders.leader-2')@endcomponent
                    </div>    

                    @foreach (langHelper::getLanguages() as $lang)
                        @if ($locale == $lang->locale)
                            @component('components.form.field-input', [
                                    "type" => "text",
                                    "field" => "Nom ".$lang->name."",
                                    "model" => "data.".$lang->locale.".name",
                            ])@endcomponent
                            @component('components.form.field-input', [
                                    "type" => "text",
                                    "field" => "Description ".$lang->name."",
                                    "model" => "data.".$lang->locale.".description",
                            ])@endcomponent 
                        @endif 
                    @endforeach

                    


                    @component('components.form.field-status')@endcomponent
                </div>
            </div>
        </div>

        <div class="footer_model">
            <div class="grid_1 gap_secoundary">
                @if ($type == 'edit')
                    <button class="btn btn_primary" type="button" wire:click='create'>
                        <div class="text text_secoundary"> {{__("app.edit_item")}} </div>
                    </button>
                @else
                    <button class="btn btn_primary" type="button" wire:click='create'>
                        <div class="text text_secoundary"> {{__("app.add_new")}} </div>
                    </button>
                @endif
            </div>
        </div>

    </div>
</div>