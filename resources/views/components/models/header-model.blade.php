<div class="header_model flex_between_center">
    @if ($typeModel === "create")
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
