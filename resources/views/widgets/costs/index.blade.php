<div class="content_costs">
    @if ($data != [])
        <div class="header_primary">
            <div class="flex_start_center">
                <div class="text text_secoundary grey_text">N'4578875677</div>
                <div class="slash"></div>
                <div class="text text_secoundary grey_text">{{$data['name']}}</div>
            </div>
            <div class="text text_secoundary primary_color integer">total: 354.56Dh</div>
        </div>
    @endif
    <div class="body_content_costs">
        @foreach ($collection as $item)
        <div class="card_cost_add">
            <div class="image_sd m_auto"> 
                <img src="{{asset("assets/media/png/google-docs.png")}}" alt="">
            </div>
            <div class="">
                <div class="text text_secoundarty mt_08">{{$item['name']}} </div>
                <div class="hr_primary"></div>
                <div class="flex_between_center">
                    <div class="text text_small">prix: {{$item['price']}}Dh</div>
                    <div class="text text_small">Qauntity: {{$item['quantity']}}</div>
                    <div class="text text_small">total: {{$item['total']}}Dh</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
