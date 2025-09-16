<div class="model_primary">
    <div class="content_model">
        <div class="header_model flex_between_center">
            <div class="text headline_primary">Categories</div>
            <button class="" type="button" wire:click='close'>
                <div class="text text_secoundary">X</div>
            </button>
        </div>

        <div class="body_model">
            @component('components.models.search-model')@endcomponent

            <div class="select_model scroll">
                @component('components.models.option-select')@endcomponent
            </div>
        </div>

        <div class="grid_1 gap_secoundary">
            <button class="btn btn_primary" type="button">
                <div class="text text_secoundary"> shoose </div>
            </button>
        </div>
    </div>
</div>