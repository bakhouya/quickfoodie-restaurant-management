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
                                                "field" => "prénom",
                                                "model" => "data.name",
                                            ])@endcomponent
                                            @component('components.form.field-input', [
                                                "type" => "text",
                                                "field" => "téléphone",
                                                "model" => "data.phone",
                                            ])@endcomponent
                                        </div>
                                    </div>
                                    <div class="card_form">
                                        <div class="body_card_form">
                                            @component('components.form.field-input', [
                                                    "type" => "text",
                                                    "field" => "email",
                                                    "model" => "data.email",
                                            ])@endcomponent 
                                            @if ($typeModel != "edit")
                                                @component('components.form.field-input', [
                                                    "type" => "text",
                                                    "field" => "mot de passe",
                                                    "model" => "data.password",
                                                ])@endcomponent
                                            @endif   
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
                                </div>
                                <div class="body_card_select scroll">
                                    <div class="select_model">
                                        @error('data.branch_id')
                                            <div class="option_item danger_bg">
                                                <div class="text text_small light_text">{{$message}} </div>
                                            </div>
                                        @enderror
                                        @component('widgets.users.branches', ['collection'=>$this->branches])@endcomponent
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
                                        @error('role')
                                            <div class="option_item danger_bg">
                                                <div class="text text_small light_text">{{$message}} </div>
                                            </div>
                                        @enderror
                                        @component('widgets.users.role-list', ['roles'=>$this->roles])@endcomponent
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif
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

            </form>
        </div>
    @endif
            
</div>
