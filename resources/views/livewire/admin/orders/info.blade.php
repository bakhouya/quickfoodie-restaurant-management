<div class="">
    <div class="model_primary">
        <div class="content_model">
            <div class="header_model flex_between_center">
                <div class="flex_start_center gap_1">
                    <div class="text headline_primary">commande <span class="integer">2345</span></div>
                    <div class="text text_secoundary danger_color">En attend</div>
                </div>   
                <div class="flex_start_center">
                    <button class="btn_icon" type="button" wire:click='close'>
                        <svg class="svg_fill" width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5V7H5C3.34315 7 2 8.34315 2 10V16C2 17.6569 3.34315 19 5 19H7C7 20.6569 8.34315 22 10 22H14C15.6569 22 17 20.6569 17 19H19C20.6569 19 22 17.6569 22 16V10C22 8.34315 20.6569 7 19 7H17V5C17 3.34315 15.6569 2 14 2H10C8.34315 2 7 3.34315 7 5ZM17 17H19C19.5523 17 20 16.5523 20 16V10C20 9.44771 19.5523 9 19 9H5C4.44772 9 4 9.44772 4 10V16C4 16.5523 4.44772 17 5 17H7V16C6.44772 16 6 15.5523 6 15C6 14.4477 6.44772 14 7 14H17C17.5523 14 18 14.4477 18 15C18 15.5523 17.5523 16 17 16V17ZM15 16H9V19C9 19.5523 9.44772 20 10 20H14C14.5523 20 15 19.5523 15 19V16ZM14 4H10C9.44771 4 9 4.44772 9 5V7H15V5C15 4.44772 14.5523 4 14 4Z" fill=""/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 12C18.5523 12 19 11.5523 19 11C19 10.4477 18.5523 10 18 10C17.4477 10 17 10.4477 17 11C17 11.5523 17.4477 12 18 12Z" fill=""/>
                        </svg>
                    </button>
                    <div class="slash"></div>
                    <button class="btn_icon" type="button" wire:click='dispatchClose'>
                        <svg class="svg_stroke" width="24"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.0605 6.06104L6.06055 18.061" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.06055 6.06104L18.0605 18.061" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="body_model">
                <div class="wrapper_details_order">
                    <div class="header_info_order">
                        <div class="center_grid">
                            @for ($i = 1; $i < 5; $i++)
                                <div class="item_order @if($tabs == $i) active @endif" wire:click='changeTabs("{{$i}}")'>
                                    <img src="{{asset("assets/media/food/".$i.".png")}}" alt="">
                                </div>
                            @endfor 
                        </div>
                        <button class="item_order add_now" type="button">
                            <svg class="svg_stroke" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 6V18" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 12H18" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>   
                    </div>
                    <div class="hr_card"></div>
                    <div class="body_info_order scroll">
                        @if ($loading)
                            @component('components.leaders.leader-center')@endcomponent
                        @else    
                            <div class="info_list_order" >
                                <div class="header_primary flex_between_center">
                                    <div class="text text_secoundary">pizza hauts</div>
                                    <div class="text text_secoundary text_click danger_color" wire:click='getBoxDelete'>{{__("app.delete")}} </div>
                                </div>
                                <div class="hr_card"></div>
                                <div class="body_primary grid_1 gap_secoundary">
                                    <div class="card_details">
                                        <div class="header_title_info flex_between_center">
                                            <div class="text text_secoundary">limites</div>
                                            <button class="" type="button" wire:click="getBoxSelect">
                                                <div class="text text_small primary_color">{{__("app.edit")}} </div>
                                            </button>
                                        </div>
                                        <div class="list_info_small">
                                            <div class="flex_between_center">
                                                <div class="text text_secoundary grey_text">fromage | frite | tomate</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_details">
                                        <div class="header_title_info flex_between_center">
                                            <div class="text text_secoundary">supléments</div>
                                            <button class="" type="button" wire:click="getBoxSelect">
                                                <div class="text text_small primary_color">{{__("app.edit")}}</div>
                                            </button>
                                        </div>
                                        <div class="list_info_small">
                                            <div class="flex_between_center">
                                                <div class="text text_secoundary grey_text">formage</div>
                                                <div class="text text_secoundary grey_text">3dh</div>
                                            </div>
                                            <div class="flex_between_center">
                                                <div class="text text_secoundary grey_text">tomate grande</div>
                                                <div class="text text_secoundary grey_text">1dh</div>
                                            </div>
                                            <div class="flex_between_center">
                                                <div class="text text_secoundary grey_text">frite</div>
                                                <div class="text text_secoundary grey_text">5dh</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="types_action_order">
                            <div class="header_primary">
                                <div class="text text_secoundary">informations client</div>
                            </div>
                            <div class="hr_card"></div>
                            <div class="body_primary grid_1 gap_x">
                                <div class="flex_between_center gao_1">
                                    <div class="text text_secoundary grey_text">le nom:</div>
                                    <div class="text text_secoundary grey_text">Mostafa ell</div>
                                </div>
                                <div class="flex_between_center">
                                    <div class="text text_secoundary grey_text">téléphone:</div>
                                    <div class="text text_secoundary primary_color integer">0635654345</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex_between_center total_order">
                        <div class="flex_start_center gap_1">
                            <div class="text text_small grey_text">peyment method :</div>
                            <div class="text text_small grey_text">cash en delevery</div>
                        </div>
                        <div class="slash"></div>
                        <div class="flex_start_center gap_1">
                            <div class="text text_small grey_text">total :</div>
                            <div class="text text_primary primary_color integer">234.99dh</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_model grid_2 gap_secoundary">
                <button class="btn btn_danger sm" type="button">
                    <div class="text text_small light_text"> refus </div>
                </button>
                <button class="btn btn_primary sm" type="button">
                    <div class="text text_small light_text">  accepter </div>
                </button>
            </div>
        </div>
    </div>
    @if ($boxSelect)
        @component('widgets.orders.edit-change-box')@endcomponent
    @endif
    @if ($delete)
        @component('widgets.components.delete')@endcomponent
    @endif
</div>
