<div class="flex_end_center">
    <div class="flex_start_center gap_05 tabs_lang">
        <button class="tabs_btn" type="button" wire:click='changeTabs("ar")'>
            <img src="{{asset("assets/media/lang/ma.png")}}">
        </button>
        <div class="slash"></div>
        <button class="tabs_btn" type="button" wire:click='changeTabs("fr")'>
            <img src="{{asset("assets/media/lang/mf.png")}}">
        </button>
        <div class="slash"></div>
        <button class="tabs_btn" type="button" wire:click='changeTabs("en")'>
            <img src="{{asset("assets/media/lang/gb.png")}}">
        </button>
    </div>
</div>