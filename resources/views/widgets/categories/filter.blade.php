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
        <div class="text text_small">{{__("app.cancel")}}</div>
    </div>
    <div class="body_filter scroll">
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
                <div class="text text_secoundary grey_text" wire:ignore.self>classment</div>
            </div>
            <div class="body_item_filter grid_2 gap_secoundary" wire:ignore.self>
                <label for="asc" class="flex_between_center item_body_filter">
                    <input type="radio" name="orderby" id="asc" value="ASC" wire:model.live='orderBy' hidden>
                    <div class="text text_secoundary grey_text">ascendant</div>
                </label>
                <label for="desc" class="flex_between_center item_body_filter">
                    <input type="radio" name="orderby" id="desc" value="DESC" wire:model.live='orderBy' hidden>
                    <div class="text text_secoundary grey_text">descendant</div>
                </label>
            </div>
            {{-- <div class="hr_primary"></div> --}}
        </div>
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
                <div class="text text_secoundary grey_text" wire:ignore.self>status</div>
            </div>
            <div class="body_item_filter grid_3 gap_secoundary" wire:ignore.self>
                <label for="all" class="flex_between_center item_body_filter">
                    <input type="radio" name="status" id="all" value="" wire:model.live='filterStatus' hidden>
                    <div class="text text_secoundary grey_text">touts</div>
                </label>
                <label for="active" class="flex_between_center item_body_filter">
                    <input type="radio" name="status" id="active" value="1" wire:model.live='filterStatus' hidden>
                    <div class="text text_secoundary grey_text">activé(e)</div>
                </label>
                <label for="desactive" class="flex_between_center item_body_filter">
                    <input type="radio" name="status" id="desactive" value="false" wire:model.live='filterStatus' hidden>
                    <div class="text text_secoundary grey_text">désactivé(e)</div>
                </label>
            </div>
            {{-- <div class="hr_primary"></div> --}}
        </div>
        {{-- <div class="item_filter_box">
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
                <div class="text text_secoundary grey_text" wire:ignore.self>status</div>
            </div>
            <div class="body_item_filter grid_1 gap_secoundary" wire:ignore.self>
                @component('components.form.fillter-price')
                    
                @endcomponent
            </div>
            {{-- <div class="hr_primary"></div> --}}
        {{-- </div> --}} 
        
    </div>

</section>
