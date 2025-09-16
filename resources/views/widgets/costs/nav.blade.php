<div class="nav_costs">
    <div class="grid_1 nav_header_costs">
        <button class="btn btn_primary" type="button" wire:click='selectFor'>
            <span class="text text_small light_text"> select forniseure </span>
        </button>
    </div>
    <div class="grid_1 scroll elements_costs">
        @if ($collection != null)
        @foreach ($collection as $item)
            <div class="item_cost" wire:click='getModelAddCost({{$item->id}})'>
                <div class="image_item m_auto">
                    {{-- <img src="{{asset("storage/".$item->image)}}" alt="{{$item->name}}"> --}}
                    <img src="{{asset("assets/media/food/12.png")}}" alt="{{$item->name}}">
                </div>
                <div class="text text_small grey_text center mt_08">{{Str::limit($item->name, 10)}} </div>
            </div>
        @endforeach
        @endif
        
        
    </div>
</div>