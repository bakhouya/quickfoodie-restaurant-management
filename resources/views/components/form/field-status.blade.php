<div class="footer_card_form">
    <label for="status" class="field_status flex_between_center">
        <div class="">
            <div class="text text_secoundary">Status</div>
            <div class="text text_small">are you sure you want publish this item</div>
        </div>
        {{-- @component('components.form.check' , [
                    "type" => "checkbox",
                    "field" => "status" ,
                    "model" => "data.status",]) 
        @endcomponent --}}
        <div class="switch">
            <input type="checkbox" hidden class="hidden"
                wire:model.stop="data.status"
                id="status" @if($status == 1) checked @endif>
            <label for="status" class="switch_primary"></label>
        </div>
    </label>
</div>