<div class="confirm_trach">
    <div class="box_confirm">
        <div class="body_box_trach">
            <div class="text text_secoundary">{{__("app.delete_category")}} </div>
            <div class="text text_small mt_05"> 
                Lorem ipsum dolor sit amet consectetur.
            </div>
        </div>
        <div class="foter_box_trach grid_2 gap_primary">
            <button class="btn_trach" type="button" wire:click='close'>
                <div class="text text_secoundary"> {{__("app.close")}}</div>
            </button>
            <button class="btn_trach" type="button" wire:click='forceDelete'>
                <div class="text text_secoundary danger_color">{{__("app.delete")}} </div>
            </button>
        </div>
    </div>
</div>