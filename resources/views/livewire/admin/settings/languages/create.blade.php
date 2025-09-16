<div>
    <button class="btn btn_primary" wire:click='getModelcreate'>
        <div class="text text_secoundary light_text"> ajouter </div>
    </button>
    @if ($model)
        <div class="model_primary">
            <div class="content_model">
                <div class="header_model flex_between_center">
                    @if ($typeModel == "create")
                        <div class="text headline_primary"> {{__("app.add_item")}} </div>
                    @else
                        <div class="text headline_primary"> {{__("app.edit_item")}} </div>
                    @endif
                    <button class="" type="button" wire:click='close'>
                        <svg class="svg_stroke" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.0605 6.06104L6.06055 18.061" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.06055 6.06104L18.0605 18.061" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <div class="fixed" wire:loading wire:target='create'>
                    @component('components.leaders.leader-1')@endcomponent
                </div>
                <div class="body_model">
                    <div class="form_model scroll">
                        <div class="card_form">
                            <div class="body_card_form">
                                <div class="center" wire:loading wire:target='image'>
                                    <div class="flex_center_center item_file">
                                        @component('components.leaders.leader-1')@endcomponent
                                    </div>
                                </div> 
                                @component('components.form.field-file', [
                                        "type" => "text",
                                        "field" => "image",
                                        "multi" => "false",
                                        "model" => "image",
                                ])@endcomponent 
                                <div class="priv_1">
                                    @if ($image != "")
                                        <div class="form_preview_file" wire:animation>
                                            <img src="{{$image->temporaryUrl()}}" alt="">
                                            <button class="btn_remove" type="button" wire:click="removeImage">
                                                <text class="text_small">X</text>
                                            </button>
                                        </div>
                                    @else
                                        @if ($typeModel == "update" && $data["image"] != "")
                                            <div class="form_preview_file">
                                                <img src="{{asset("storage/".$data["image"])}}" alt="">
                                            </div>
                                        @endif
                                    @endif    
                                </div>
                                @component('components.form.field-input', [
                                                "type" => "text",
                                                "field" => "le nom",
                                                "model" => "data.name",
                                ])@endcomponent
                                 @component('components.form.field-input', [
                                                "type" => "text",
                                                "field" => "locale ex ar, fr, en",
                                                "model" => "data.locale",
                                ])@endcomponent
                            </div>
                            @component('components.form.field-status',
                                ["status" => $data["status"],]
                            )@endcomponent
                        </div>
                    </div>
                </div>
                <div class="footer_model grid_1"> 
                    @if ($typeModel == "create")
                        <button class="btn btn_primary" type="button" wire:click='create'>
                            <div class="text text_secoundary"> {{__("app.add_new")}} </div>
                        </button>
                    @else
                        <button class="btn btn_primary" type="button" wire:click='update("{{$id}}")'>
                            <div class="text text_secoundary"> {{__("app.edit")}} </div>
                        </button>
                    @endif
                </div>

            </div>
        </div>
    @endif
</div>
