<div class="model_primary">
    <div class="content_model sm">
        <div class="header_primary flew_between_center">
            <div class="text text_primary">seplements</div>
            @component('components.models.close')@endcomponent
        </div>
        <div class="hr_card"></div>
        <div class="">
            @component('components.models.search-model')@endcomponent
            <div class="select_model scroll">
                @component('components.models.option-select')@endcomponent
            </div>
        </div>
        <div class="hr_card"></div>
        <div class="footer_primary grid_1">
            <button class="btn btn_primary" type="button" wire:click='saveChange'>
                <div class="text text_small light_text">
                    {{__("app.save_changes")}}
                </div>
            </button>
        </div>
    </div>
</div>
