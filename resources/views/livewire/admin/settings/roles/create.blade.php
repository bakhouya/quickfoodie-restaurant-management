<div>
    <button class="btn btn_primary gap_x" type="button" wire:click='getModelCreate'>
        <div class="text text_small light_text"> ajouter </div>
    </button>
    @if ($model)
        <div class="model_primary">
            <form class="content_model">
                
                <div class="header_model flex_between_center">
                    @if ($typeModel == "create")
                        <div class="text headline_primary"> {{__("app.add_item")}} </div>
                    @else
                        <div class="text headline_primary"> {{__("app.edit_item")}} </div>
                    @endif
                    @component('components.models.close')@endcomponent
                </div>
                <div class="fixed" wire:loading wire:target='create'>
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
                                    <div class="card_form">
                                        <div class="body_card_form">
                                            @component('components.form.field-input', [
                                                "type" => "text",
                                                "field" => "nom",
                                                "model" => "data.name",
                                            ])@endcomponent
                                            @component('components.form.field-input', [
                                                "type" => "text",
                                                "field" => "description",
                                                "model" => "data.description",
                                            ])@endcomponent
                                        </div>
                                        @component('components.form.field-status',
                                            ["status" => $data["status"],]
                                        )@endcomponent
                                    </div>
                                    {{-- =========================================================== --}}
                                </div>  
                            </div>    
                        @endif

                        @if ($step == 2)
                            <div class="select_card">
                                <div class="header_card_select">
                                    @component('components.models.search-model')@endcomponent
                                    <div class="flex_between_center ml_10 mt_10">
                                        <div class="text text_small">
                                            @if (count($this->permissionsData) > 0 )
                                                {{count($permissionsData)}}
                                            @endif
                                        </div>
                                        <div class="text text_small text_click" wire:click='selectAll'>
                                            @if (count($this->permissionsData) > 0 ) {{__("app.cancel")}} @else {{__("app.select_all")}} @endif
                                        </div>
                                    </div> 
                                </div>
                                <div class="body_card_select scroll">
                                    <div class="select_model">
                                        @error('permissionsData')
                                            <div class="option_item danger_bg">
                                                <div class="text text_small light_text">{{$message}} </div>
                                            </div>
                                        @enderror
                                        @component('widgets.settings.roles.permission', ['permissions'=>$this->permissions])@endcomponent
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif
                    @component('components.tabs.step-form' , ["etaps" => $etaps, "step"=>$step])@endcomponent
                    
                </div>
                <div class="footer_model grid_2 gap_secoundary"> 
                    <button class="btn btn_secoundary" type="button" wire:click='prev'>
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

            </form>
        </div>
    @endif
</div>
