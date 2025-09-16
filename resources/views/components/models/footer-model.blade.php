<div class="footer_model grid_2">
    <button class="btn btn_secoundary" type="button" wire:click='prev'>
        <div class="text text_secoundary"> retour </div>
    </button>
    @if ($activeSubmit)
        @if ($typeModel == "create")
            <button class="btn btn_primary" type="button" wire:click='create' >
                <div class="text text_secoundary"> {{__("app.add_new")}} </div>
            </button>
        @else
            <button class="btn btn_primary" type="button" wire:click='update({{$id}})'>
                <div class="text text_secoundary"> {{__("app.edit")}} </div>
            </button>
        @endif
    @else
        <button class="btn btn_primary" type="button" wire:click='next'>
            <div class="text text_secoundary"> suivant </div>
        </button>
    @endif
    

</div>