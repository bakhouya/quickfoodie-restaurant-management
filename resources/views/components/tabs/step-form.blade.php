<div class="flex_center_center etaps_list">
    <div class="flex_start_center gap_05">
        @foreach ($etaps as $etap)
            <div class="item_etap @if($step == $etap) active @endif"></div>
        @endforeach
    </div>
</div>