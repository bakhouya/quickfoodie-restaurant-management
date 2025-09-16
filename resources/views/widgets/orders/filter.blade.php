<section class="filter_wrapper active" wire:ignore.self>
    <div class="header_primary">
        <button class="get-filter" type="button" wire:ignore.self>
            <svg class="svg_stroke" width="30" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.4593 30.9081H7.88672" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M24.6221 13.1061H36.1946" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5138 13.0066C16.5138 10.6269 14.5703 8.69727 12.1734 8.69727C9.77654 8.69727 7.83301 10.6269 7.83301 13.0066C7.83301 15.3864 9.77654 17.316 12.1734 17.316C14.5703 17.316 16.5138 15.3864 16.5138 13.0066Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M37.2208 30.8365C37.2208 28.4567 35.2788 26.5271 32.8819 26.5271C30.4836 26.5271 28.54 28.4567 28.54 30.8365C28.54 33.2162 30.4836 35.1458 32.8819 35.1458C35.2788 35.1458 37.2208 33.2162 37.2208 30.8365Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        {{-- @component('components.models.close')@endcomponent --}}
        <div class="text text_small">fermer</div>
    </div>
    <div class="body_filter scroll">
        @for ($i = 1; $i < 5; $i++)
            <div class="item_filter_box">
                <div class="header_item_filter flex_start_center gap_secoundary">
                    <div class="icon_card active" wire:ignore.self>
                        <svg class="svg_stroke" width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.09277 9.40421H20.9167" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.442 13.3097H16.4512" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0045 13.3097H12.0137" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.55818 13.3097H7.56744" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.442 17.1962H16.4512" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0045 17.1962H12.0137" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.55818 17.1962H7.56744" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0433 2V5.29078" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.96515 2V5.29078" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="text text_secoundary grey_text" wire:ignore.self>etaps sempliments</div>
                </div>
                <div class="body_item_filter" wire:ignore.self>
                    <label for="{{$i}}" class="flex_between_center item_body_filter active" wire:click='updateFilter'>
                        <div class="text text_secoundary grey_text">articles</div>
                    </label>
                    <label for="{{$i}}" class="flex_between_center item_body_filter">
                        <div class="text text_secoundary grey_text">pizza hots</div>
                    </label>
                    <label for="{{$i}}" class="flex_between_center item_body_filter">
                        <div class="text text_secoundary grey_text">macdonals</div>
                    </label>
                    <label for="{{$i}}" class="flex_between_center item_body_filter">
                        <div class="text text_secoundary grey_text">macdonals</div>
                    </label>
                </div>
                {{-- <div class="hr_primary"></div> --}}
            </div>
        @endfor
    </div>
</section>
