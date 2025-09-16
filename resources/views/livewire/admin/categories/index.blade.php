<div wire:poll.alive.5s>

    @component('widgets.categories.search')@endcomponent
    
    <section class="main_container">
        <article class="section_page">
            

            <div class="container_cards active" wire:ignore.self>

                @if (count($this->listSelect) > 0)
                    <div class="header_primary p_sticky">
                        <div class="flex_start_center">
                            {{-- @if (auth()->user()->can('delete user')) --}}
                            <div class="flex_center_center text_click btn_icon" wire:click.stop='handleConfirmDeleteAll'>
                                <svg class="svg_stroke danger" height="20" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M35.9807 17.7415C35.9807 17.7415 34.9834 30.1117 34.4048 35.3224C34.1293 37.8111 32.592 39.2695 30.0739 39.3154C25.2819 39.4017 20.4844 39.4072 15.6943 39.3062C13.2717 39.2566 11.7601 37.7799 11.4901 35.3353C10.9078 30.0786 9.91602 17.7415 9.91602 17.7415" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M38.5209 11.8117H7.37402" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M32.52 11.8116C31.0781 11.8116 29.8365 10.7922 29.5537 9.37979L29.1074 7.14635C28.8318 6.11596 27.8988 5.40332 26.8353 5.40332H19.0606C17.9971 5.40332 17.0641 6.11596 16.7886 7.14635L16.3423 9.37979C16.0594 10.7922 14.8178 11.8116 13.376 11.8116" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="slash"></div>
                            {{-- @endif --}}
                            <div class="flex_center_center text_click btn_icon" wire:click.stop='handleChangeStatusAll'>
                                <svg class="svg_fill" width="20"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 5H6C5.44772 5 5 5.44772 5 6V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V6C19 5.44772 18.5523 5 18 5ZM6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6Z" fill=""/>
                                </svg>
                            </div>
                            <div class="slash"></div>
                            <div class="flex_center_center text_click btn_icon">
                                <svg class="svg_stroke" width="20"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.618 8.756H6.685C4.65 8.756 3 10.406 3 12.441V17.316C3 19.35 4.65 21 6.685 21H17.815C19.85 21 21.5 19.35 21.5 17.316V12.431C21.5 10.402 19.855 8.756 17.826 8.756L16.883 8.756" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.25 1.96242V14.0034" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.33496 4.89087L12.25 1.96287L15.166 4.89087" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                           
                        </div>
                        <div class="flex_start_center gap_05">
                            <div class="flex_start_center text_click">
                                <div class="text text_secoundary grey_text">{{count($this->listSelect)}}</div>
                            </div> 
                            <div class="slash"></div>
                            <div class="flex_start_center text_click" wire:click.stop='emptySelection'>
                                <div class="text text_secoundary danger_color">{{__("app.close")}} </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="header_primary p_sticky">
                        <div class="flex_start_center gap_05">
                            <div class="flex_start_center text_click">
                                <div class="text text_secoundary grey_text">categories</div>
                            </div>
                            <div class="slash"></div>
                            <div class="text text_secoundary grey_text">
                                {{($this->categories->currentPage() - 1) * $this->categories->perPage() + 1}} 
                                for 
                                {{min($this->categories->currentPage()*$this->categories->perPage(),$this->categories->total())}}
                                of 
                                {{$this->categories->total()}}
                            </div>
                        </div>
                        <div class="flex_start_center gap_05">
                            {{-- <div class="slash"></div> --}}
                            @if ($selection)
                                <div class="flex_start_center text_click" wire:click.stop='closeCheckSelect'>
                                    <div class="text text_secoundary grey_text">{{__("app.cancel")}}</div>
                                </div> 
                            @else
                                <div class="flex_start_center text_click" wire:click.stop='activeCheckSelect'>
                                    <div class="text text_secoundary grey_text">choisir </div>
                                </div>    
                            @endif
                        </div>
                    </div>
                @endif
                <article class="container_primary">
                    @if ($loading)
                        @component('components.leaders.leader-center')@endcomponent
                    @else
                        <div class="grid_1 gap_secoundary cards_flex">
                            @forelse ($this->categories as $cat)
                                <card class="card @if(in_array($cat->id, $this->listSelect)) selected @endif" 
                                    @if($selection) wire:click='selectThisItem("{{$cat->id}}")' @endif>                                   
                                    <div class="header_card">
                                        <img src="{{asset("storage/".$cat->image)}}" alt="" class="item">
                                    </div>
                                    <div class="body_card">
                                        <div class="cotent_body_card">
                                            <div class="flex_between_center">
                                                <div class="flex_start_center gap_1">
                                                    <div class="text text_secoundary">
                                                        {{Str::limit($cat->translate(App::getLocale())->name, 13)}}
                                                    </div>
                                                    {!!helpHelper::status($cat->status)!!}
                                                    
                                                </div>
                                                <div class="text text_small">
                                                    {{$cat->created_at->format("H:m")}}
                                                </div>
                                            </div>
                                            <div class="flex_between_center mt_05">
                                                <div class="flex_start_center">
                                                    <div class="text text_small clamp_1">{{$cat->translate(App::getLocale())->description}}</div>                
                                                </div>
                                                <div class="flex_start_center">
                                                    <div class="slash sm x"></div>
                                                    <div class="text text_small" wire:click.stop='edit("{{$cat->id}}")'>
                                                        <svg class="svg_fill" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5356 3.8076C15.7071 2.63602 17.6066 2.63602 18.7782 3.8076L20.1924 5.22181C21.364 6.39338 21.364 8.29288 20.1924 9.46445L9.7999 19.857C9.6603 19.9966 9.4825 20.0917 9.28891 20.1304L3.98561 21.1911C3.28589 21.331 2.66897 20.7141 2.80892 20.0144L3.86958 14.7111C3.90829 14.5175 4.00345 14.3397 4.14305 14.2001L14.5356 3.8076ZM17.364 5.22181L18.7782 6.63602C19.1687 7.02655 19.1687 7.65971 18.7782 8.05024L17.364 9.46445L14.5356 6.63603L15.9498 5.22181C16.3403 4.83129 16.9735 4.83129 17.364 5.22181ZM13.1213 8.05024L5.77136 15.4002L5.06425 18.9358L8.59978 18.2286L15.9498 10.8787L13.1213 8.05024Z" fill=""/>
                                                        </svg> 
                                                    </div>
                                                </div>         
                                            </div>
                                        </div>
                                    </div>

                                </card>
                            @empty
                                @component('components.min.empty-data')@endcomponent
                            @endforelse
                        </div>
                        {{ $this->categories->links('components.min.paginate') }}
                    @endif
                </article>

            </div> 
            @component('widgets.categories.filter')@endcomponent


        </article>   
            
    </section>

    @if ($delete)
        @component('widgets.categories.confirm')@endcomponent
    @endif
    
</div>
