<div class="">
    <button class="btn btn_primary gap_x" type="button" wire:click='getModelCreate'>
        <div class="text text_small light_text"> ajouter </div>
    </button>


    @if ($model)
        <div class="model_primary">
            <div class="content_model">
                <div class="header_model flex_between_center">
                    @if ($typeModel == "create")
                        <div class="text headline_primary"> {{__("app.add_category")}} </div>
                    @else
                        <div class="text headline_primary"> {{__("app.edit_category")}} </div>
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
                        @if ($loading)
                            @component('components.leaders.leader-center')@endcomponent
                        @else                  
                            @if ($step == 1)
                                <div class="grid_1 gap_x">
                                    {{-- =========================================================== --}}
                                    {{-- =========================================================== --}}
                                    <div class="card_form">
                                        <div class="header_card_form flex_center_center">
                                            @component('widgets.categories.tabs', ["locale" => $tabs])@endcomponent
                                        </div>
                                        <div class="body_card_form">
                                            @foreach (langHelper::getLanguages() as $lang)
                                                @if ($tabs === $lang->locale)
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
                                        </div>
                                        @component('components.form.field-status',
                                            ["status" => $data["status"],]
                                        )@endcomponent
                                    </div>
                                    {{-- =========================================================== --}}
                                </div>      
                            @endif

                            @if ($step == 2)
                                <div class="grid_1 gap_x">
                                    {{-- =========================================================== --}}
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
                                                    @if ($typeModel == "edit" && $data["image"] != "")
                                                        <div class="form_preview_file">
                                                            <img src="{{asset("storage/".$data["image"])}}" alt="">
                                                        </div>
                                                    @endif
                                                @endif    
                                            </div>
                                            
                                        </div>
                                    </div>
                                    {{-- =========================================================== --}}
                                </div>
                            @endif
                        @endif
                    </div>
                    @component('components.tabs.step-form' , ["etaps" => $etaps, "step"=>$step])@endcomponent
                </div>

                <div class="footer_model grid_2 gap_secoundary"> 
                    
                    <button class="btn btn_secoundary @if ($step <= 1) disable @endif" type="button" wire:click='prev'>
                        <div class="text text_secoundary"> retour </div>
                    </button>
                    
                    @if ($activeSubmit)
                        @if ($typeModel == "create")
                            <button class="btn btn_primary" type="button" wire:click='create'>
                                <div class="text text_secoundary"> {{__("app.add_new")}} </div>
                            </button>
                        @else
                            <button class="btn btn_primary" type="button" wire:click='update("{{$id}}")'>
                                <div class="text text_secoundary"> {{__("app.edit")}} </div>
                            </button>
                        @endif
                    @else
                        <button class="btn btn_primary" type="button" wire:click='next'>
                            <div class="text text_secoundary"> suivant </div>
                        </button>
                    @endif
                </div>

            </div>
        </div>
    @endif
</div>

