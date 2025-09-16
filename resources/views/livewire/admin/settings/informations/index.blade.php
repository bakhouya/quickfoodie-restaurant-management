<div class="wrapper_settings">
    <div class="box_settings">

        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">Logo platform</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div>  
            <div class="center" wire:loading wire:target='logo'>
                <div class="flex_center_center item_file">
                    @component('components.leaders.leader-1')@endcomponent
                </div>
            </div> 
            <div class="field_file_settings">
                <div class="form_file">
                    @component('components.form.field-file', [
                            "type" => "text",
                            "field" => "image",
                            "multi" => "false",
                            "model" => "logo",
                    ])@endcomponent 
                </div>
                <div class="priv_1">
                    @if ($logo != "")
                        <div class="settings_preview_file" wire:animation >
                            <img src="{{$logo->temporaryUrl()}}" alt="">
                            <button class="btn_remove" type="button" wire:click="removeImage">
                                <text class="text_small">X</text>
                            </button>
                        </div>
                    @else
                        @if ($data["image"] != "")
                            <div class="settings_preview_file">
                                <img src="{{asset("storage/".$data["image"])}}" alt="">
                            </div>
                        @endif
                    @endif    
                </div> 
            </div> 
        </div>


        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">icon or favicon</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div> 
            <div class="center" wire:loading wire:target='icon'>
                <div class="flex_center_center item_file">
                    @component('components.leaders.leader-1')@endcomponent
                </div>
            </div> 
            <div class="field_file_settings">
                <div class="form_file">
                    @component('components.form.field-file', [
                            "type" => "text",
                            "field" => "icon",
                            "multi" => "false",
                            "model" => "icon",
                    ])@endcomponent 
                </div>
                <div class="priv_1">
                    @if ($icon != "")
                        <div class="settings_preview_file" wire:animation >
                            <img src="{{$icon->temporaryUrl()}}" alt="">
                            <button class="btn_remove" type="button" wire:click="removeImage">
                                <text class="text_small">X</text>
                            </button>
                        </div>
                    @else
                        @if ($data["icon"] != "")
                            <div class="settings_preview_file">
                                <img src="{{asset("storage/".$data["icon"])}}" alt="">
                            </div>
                        @endif
                    @endif    
                </div> 
            </div>
        </div>

        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">presontation</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div> 
            @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "Nom platform",
                    "model" => "data.name",
            ])@endcomponent
            @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "description",
                    "model" => "data.description",
            ])@endcomponent
        </div>
        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">seo integration</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div> 
            @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "title seo",
                    "model" => "data.seoName",
            ])@endcomponent
            @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "Description seo",
                    "model" => "data.seoDescription",
            ])@endcomponent
        </div>
        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">tags for seo</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div> 
            @component('components.form.field-tags', [
                    "collections" => $this->tags ,
                    "type" => "text",
                    "field" => "Name & Fullname",
                    "model" => "tag",
            ])@endcomponent
        </div>
        <div class="row_settings_fields">
            <div class="">
                <div class="text text_secoundary">des contacts</div>
                <div class="text_small">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div> 
            </div> 
            @component('components.form.field-input', [
                    "type" => "email",
                    "field" => "email",
                    "model" => "data.email",
            ])@endcomponent
            @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "téléphone",
                    "model" => "data.phone",
            ])@endcomponent
        </div>
        <div class="flex_start_center">
            @component('components.buttons.update')@endcomponent
        </div>
    </div> 
</div>
