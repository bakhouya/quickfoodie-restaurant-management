<div class="filter_box_float">
    <div class="header_primary">
        <div class="text headline_primary">Categories</div>
        @component('components.models.close')@endcomponent
    </div>
    <div class="scroll body_filter_float">
        <div class="header_card_select mt_10 ml_10 mr_10">
            @component('components.models.search-model')@endcomponent
        </div>
        <div class="select_model">
            @component('widgets.articles.category',["collection"=> $collection])@endcomponent
        </div>
    </div>
</div>