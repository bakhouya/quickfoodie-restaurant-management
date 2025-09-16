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
                        @component('components.form.field-input', [
                                        "type" => "text",
                                        "field" => "price",
                                        "model" => "cost.price",
                        ])@endcomponent
                        @component('components.form.field-input', [
                                        "type" => "text",
                                        "field" => "quantity",
                                        "model" => "cost.quantity",
                        ])@endcomponent
                        @component('components.form.field-input', [
                                        "type" => "text",
                                        "field" => "prix total",
                                        "model" => "cost.total",
                        ])@endcomponent
                    </div>
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
