<div class="">
    <button class="btn btn_primary gap_x" type="button" wire:click='getModelCreate'>
        <div class="text text_small light_text"> ajouter </div>
    </button>



    @if ($model)
        <div class="model_primary">
            <div class="content_model">
                @component('components.models.header-model' , ["typeModel" => $typeModel])@endcomponent  
                <div class="fixed" wire:loading wire:target='{{$typeModel}}'> 
                    @component('components.leaders.leader-1')@endcomponent
                </div>
                
                
                <div class="body_model">
                    @if ($loading)
                        @component('components.leaders.leader-center')@endcomponent
                    @else  

                        @if ($step == 1)
                            <div class="form_model scroll">
                                <div class="grid_1 gap_x">
                                    {{-- =========================================================== --}}
                                    {{-- =========================================================== --}}
                                    <div class="card_form">
                                        <div class="header_card_form flex_center_center">
                                            @component('widgets.categories.tabs', ["locale" => $tabs])@endcomponent
                                        </div>
                                        <div class="body_card_form">
                                            @foreach (langHelper::getLanguages() as $lang)
                                                @if ($tabs == $lang->locale)
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
                                    </div>
                                    {{-- =========================================================== --}}
                                    {{-- =========================================================== --}}
                                    <div class="card_form">
                                        <div class="body_card_form">
                                            @component('components.form.field-tags', [
                                                    "collections" => $this->tags ,
                                                    "type" => "text",
                                                    "field" => "Name & Fullname",
                                                    "model" => "tag",
                                            ])@endcomponent
                                            @component('components.form.field-group', [
                                                    "type" => "text",
                                                    "field" => "Prix vente",
                                                    "model" => "data.price",
                                            ])@endcomponent
                                            @component('components.form.field-group', [
                                                    "type" => "text",
                                                    "field" => "Prix d'achat ",
                                                    "model" => "data.price_achat",
                                            ])@endcomponent
                                        </div>
                                        <div class="footer_card_form">
                                            <label foe="status" class="field_status flex_between_center">
                                                <div class="">
                                                    <div class="text text_secoundary">Status</div>
                                                    <div class="text text_small">are you sure you want publish this item</div>
                                                </div>
                                                @component('components.form.check' , [
                                                            "type" => "checkbox",
                                                            "field" => "status" ,
                                                            "model" => "data.status",]) 
                                                @endcomponent
                                            </label>
                                        </div>
                                    </div>
                                    {{-- =========================================================== id="prev"--}}
                                </div>  
                            </div>    
                        @endif

                        @if ($step == 2)
                            <div class="form_model scroll">
                                <div class="grid_1 gap_x">
                                    <div class="card_form">
                                        <div class="body_card_form">

                                            @component('components.form.field-file', [
                                                    "type" => "text",
                                                    "field" => "images",
                                                    "model" => "images",
                                                    "multi" => true,
                                            ])@endcomponent
                                            <div class="center" wire:loading wire:target='images'>
                                                @component('components.leaders.leader-1')@endcomponent
                                            </div>
                                            @if ($images != [])
                                                @component('components.form.priv-images', [
                                                    "collections" => $this->images ,
                                                ])@endcomponent
                                            @else
                                                @if ($this->isImages != [] && $images == [] && $typeModel != "create")
                                                    @component('components.form.edit-multi-file', [
                                                        "collections" => $this->isImages ,
                                                    ])@endcomponent
                                                @endif
                                            @endif
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($step == 3)
                            <div class="select_card">
                                <div class="header_card_select">
                                    @component('components.models.search-model')@endcomponent
                                </div>
                                <div class="body_card_select scroll">
                                    <div class="select_model">
                                        @error('permissionsData')
                                            <div class="option_item danger_bg">
                                                <div class="text text_small light_text">{{$message}} </div>
                                            </div>
                                        @enderror
                                        @component('widgets.articles.category', ['collection'=>$this->categories])@endcomponent
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif
                </div>

                @component('components.tabs.step-form' , ["etaps" => $etaps, "step"=>$step])@endcomponent
                @component('components.models.footer-model' , [
                    "typeModel" => $typeModel , 
                    "activeSubmit" => $activeSubmit , 
                    "id"=> $id
                ])@endcomponent
                

            </div>
        </div>
    @endif
</div>

