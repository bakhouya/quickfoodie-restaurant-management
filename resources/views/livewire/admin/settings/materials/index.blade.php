<div class="settings_wrapper_index">
    <div class="search_items">
        <div class="box_search">
            <input type="text" placeholder="{{__("app.search")}}" wire:model.live='search'>
        </div>
        @livewire('admin.settings.materials.create')
    </div>
    <div class="items_cards_settings">
        <div class="cards_flex">
            @forelse ($this->materials as $index => $material)
            <div class="item_list">
                <div class="header_item flex_center_center">
                    <div class="avatar_primary"> <div class="text text_secoundary">{{$index}} </div> </div>
                </div>
                <div class="slash"></div>
                <div class="body_item flex_between_center">
                    <div class="flex_start_center gap_1">
                        <div class="text text_secoundary">{{$material->name}}</div>
                        {!!helpHelper::status($material->status)!!}
                    </div>
                    
                    <div class="flex_start_center actions_card">
                        <button type="button" class="text text_small" wire:click.stop='edit("{{$material->id}}")'>
                            <svg class="svg_fill" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5356 3.8076C15.7071 2.63602 17.6066 2.63602 18.7782 3.8076L20.1924 5.22181C21.364 6.39338 21.364 8.29288 20.1924 9.46445L9.7999 19.857C9.6603 19.9966 9.4825 20.0917 9.28891 20.1304L3.98561 21.1911C3.28589 21.331 2.66897 20.7141 2.80892 20.0144L3.86958 14.7111C3.90829 14.5175 4.00345 14.3397 4.14305 14.2001L14.5356 3.8076ZM17.364 5.22181L18.7782 6.63602C19.1687 7.02655 19.1687 7.65971 18.7782 8.05024L17.364 9.46445L14.5356 6.63603L15.9498 5.22181C16.3403 4.83129 16.9735 4.83129 17.364 5.22181ZM13.1213 8.05024L5.77136 15.4002L5.06425 18.9358L8.59978 18.2286L15.9498 10.8787L13.1213 8.05024Z" fill=""/>
                            </svg> 
                        </button>
                        <div class="slash sm x"></div>
                        <button type="button" class="text text_small" wire:click.stop='handleConfirmDelete("{{$material->id}}")'>
                            <svg class="svg_fill" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10C10.5523 10 11 10.4477 11 11V16C11 16.5523 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V11C9 10.4477 9.44772 10 10 10Z" fill="#6F767E"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10C14.5523 10 15 10.4477 15 11V16C15 16.5523 14.5523 17 14 17C13.4477 17 13 16.5523 13 16V11C13 10.4477 13.4477 10 14 10Z" fill="#6F767E"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2C8.34315 2 7 3.34315 7 5H4H3C2.44772 5 2 5.44772 2 6C2 6.55228 2.44772 7 3 7H4V19C4 20.6569 5.34315 22 7 22H17C18.6569 22 20 20.6569 20 19V7H21C21.5523 7 22 6.55228 22 6C22 5.44772 21.5523 5 21 5H20H17C17 3.34315 15.6569 2 14 2H10ZM15 5C15 4.44772 14.5523 4 14 4H10C9.44772 4 9 4.44772 9 5H15ZM7 7H6V19C6 19.5523 6.44772 20 7 20H17C17.5523 20 18 19.5523 18 19V7H17H7Z" fill=""/>
                            </svg>
                        </button>
                        <div class="slash sm x"></div>
                        <div class="switch">
                            <input type="checkbox" hidden class="hidden"
                                wire:model.stop="data.status"
                                @if ($material->status) checked @endif
                                wire:change='handleChangeStatus({{$material->id}})'
                                id="status-{{$material->id}}"/>
                            <label for="status-{{$material->id}}" class="switch_primary"></label>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse 
        </div>
    </div>
    @if ($delete)
        @component('widgets.categories.confirm')@endcomponent
    @endif
</div>
