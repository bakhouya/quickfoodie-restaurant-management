@for ($i = 1; $i < 10; $i++)
    <div class="card_flex @if($i == 1) danger @endif
        @if($i == 2) primary @endif @if($i == 3) success @endif" wire:click='getInfOrder("{{$i}}")'>
        <div class="header_card_flex">
            <div class="text headline_primary">
                {{$i}}
            </div>
        </div>
        <div class="body_card_flex">
            <div class="flex_start_center gap_1">
                <div class="text text_secoundary">cammandes articles</div>
                @if ($i == 1)
                <div class="text text_secoundary danger_color">accepter</div>
            @elseif($i == 2) 
                <div class="text text_secoundary secoundary_color">préparer</div>
            @elseif($i == 3) 
                <div class="text text_secoundary success_color">livrée</div> 
            @else
                <div class="text text_secoundary primary_color">terminée</div>
            @endif
            </div>
            <div class="flex_start_center gap_05">
                <div class="text text_small">prix: {{$i}}5dh </div>
                <div class="text text_small">|</div>
                <div class="text text_small">quantité: {{$i}} </div>
                <div class="text text_small">|</div>
                <div class="text text_small">{{date("H:m:s")}} </div>
            </div>
        </div>
        <div class="footer_card_flex">
            @if ($i == 1)
                <button class="btn btn_danger sm" type="button" 
                    wire:click.stop='changeStatus'>
                    <div class="text text_small light_text">attendre</div>
                </button>
            @elseif($i == 2) 
                <button class="btn btn_secoundary sm" type="button">
                    <div class="text text_small light_text">shipping</div>
                </button>
            @elseif($i == 3) 
                <button class="btn btn_success sm" type="button">
                    <div class="text text_small light_text">delevery</div>
                </button> 
            @else
                <button class="btn btn_default sm" type="button">
                    <div class="text text_small">terminée</div>
                </button>
            @endif
        </div>
    </div>
@endfor