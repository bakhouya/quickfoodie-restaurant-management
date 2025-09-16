<section class="filter_wrapper active" wire:ignore.self>
    <div class="header_primary">
        <div class="flex_start_center gap_1">
            <button class="get-filter" type="button" wire:ignore.self>
                <svg class="svg_stroke" width="24" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.4593 30.9081H7.88672" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24.6221 13.1061H36.1946" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5138 13.0066C16.5138 10.6269 14.5703 8.69727 12.1734 8.69727C9.77654 8.69727 7.83301 10.6269 7.83301 13.0066C7.83301 15.3864 9.77654 17.316 12.1734 17.316C14.5703 17.316 16.5138 15.3864 16.5138 13.0066Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M37.2208 30.8365C37.2208 28.4567 35.2788 26.5271 32.8819 26.5271C30.4836 26.5271 28.54 28.4567 28.54 30.8365C28.54 33.2162 30.4836 35.1458 32.8819 35.1458C35.2788 35.1458 37.2208 33.2162 37.2208 30.8365Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="text text_secoundary grey_text">permissions</div>
        </div>
        @component('components.models.close')@endcomponent
    </div>
    <div class="hr_card"></div>
    <div class="body_filter scroll"> 
        @component('components.models.search-model')@endcomponent
        @forelse ($this->permissions as $permission)
            <label for="{{$permission->name}}" class="item_primary_list flex_between_center">
                <div class="text text_secoundary grey_text">{{$permission->name}} </div>
                @if ($hasPermission)
                    <div class="switch">
                        <input type="checkbox" hidden class="hidden" id="{{$permission->name}}"
                            wire:model.stop="permissionData" value="{{$permission->name}}"
                            wire:change='handlePermision'>
                        <label for="{{$permission->name}}" class="switch_primary"></label>
                    </div>
                @endif    
            </label>
        @empty
            @component('components.min.empty-data')@endcomponent
        @endforelse
    </div>







    {{-- @if(auth()->user()->hasRole('admin'))
        <p>أنت أدمن</p>
    @endif

    @can('manage orders')
        <button>إدارة الطلبات</button>
    @endcan --}}
</section>
