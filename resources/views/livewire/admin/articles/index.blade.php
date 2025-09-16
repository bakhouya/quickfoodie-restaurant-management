<div wire:poll.alive.5s>

    @component('widgets.articles.search')@endcomponent
    
    <section class="main_container">
        <article class="section_page">
            

            <div class="container_cards active" wire:ignore.self>
                @if (count($this->listSelect) > 0)
                    <div class="header_primary p_sticky">
                        <div class="flex_start_center">
                            
                            <div class="flex_center_center text_click btn_icon" wire:click.stop='handleConfirmDeleteAll'>
                                <svg class="svg_stroke danger" height="20" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M35.9807 17.7415C35.9807 17.7415 34.9834 30.1117 34.4048 35.3224C34.1293 37.8111 32.592 39.2695 30.0739 39.3154C25.2819 39.4017 20.4844 39.4072 15.6943 39.3062C13.2717 39.2566 11.7601 37.7799 11.4901 35.3353C10.9078 30.0786 9.91602 17.7415 9.91602 17.7415" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M38.5209 11.8117H7.37402" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M32.52 11.8116C31.0781 11.8116 29.8365 10.7922 29.5537 9.37979L29.1074 7.14635C28.8318 6.11596 27.8988 5.40332 26.8353 5.40332H19.0606C17.9971 5.40332 17.0641 6.11596 16.7886 7.14635L16.3423 9.37979C16.0594 10.7922 14.8178 11.8116 13.376 11.8116" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="slash"></div>
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
                            <div class="flex_start_center text_click" wire:click='changeTabs("1")'>
                                {{-- @if($tabs == 1) active @endif --}}
                                <div class="text text_secoundary grey_text">{{__("app.menu_items")}}</div>
                            </div>
                        </div>
                        <div class="flex_start_center gap_05">
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
                    <div class="cards_flex">
                        @forelse ($this->meals as $meal)
                            <card class="card @if(in_array($meal->id, $this->listSelect)) selected @endif" 
                                @if($selection) wire:click='selectThisItem("{{$meal->id}}")' @endif>                                   
                                <div class="header_card">
                                    @if ($loading)
                                        @component('components.leaders.leader-center')@endcomponent
                                    @else  
                                        <img src="{{asset("storage/".$meal->lastMessage())}}" alt="" class="item">
                                    @endif
                                </div>
                                <div class="body_card">
                                    <div class="cotent_body_card">
                                        <div class="flex_between_center">
                                            <div class="flex_start_center gap_1">
                                                <div class="text text_secoundary">
                                                    {{Str::limit($meal->translate(App::getLocale())->name, 13)}}
                                                </div>
                                                @if ($meal->status == false )
                                                    <div class="text text_small danger_color">
                                                        désactiver
                                                    </div>
                                                @else
                                                    <div class="text text_small primary_color">
                                                        active
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="text text_small grey_text">
                                                {{$meal->price}}Dh
                                            </div>
                                        </div>
                                        <div class="flex_between_center mt_05">
                                            <div class="details_card">
                                                {{-- <div class="text text_small clamp_1">
                                                    {{Str::limit($meal->description, 20)}}
                                                </div>   --}}
                                                {{-- <div class="slash"></div> --}}
                                                <div class="flex_start_center gap_05">
                                                    <img src="{{asset("storage/".$meal->category->image)}}" class="avatar_small">
                                                    <div class="text text_small clamp_1">{{$meal->category->name}}</div>
                                                </div> 
                                                <div class="slash"></div> 
                                                <div class="flex_start_center gap_05">
                                                    <svg class="svg_fill" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9999 17C16.112 17 18.5865 13.933 19.6829 12.1047C19.708 12.063 19.7149 12.0278 19.7149 12C19.7149 11.9722 19.708 11.937 19.6829 11.8953C18.5865 10.067 16.112 7 11.9999 7C7.88789 7 5.41337 10.067 4.31694 11.8953C4.29189 11.937 4.28503 11.9722 4.28503 12C4.28503 12.0278 4.29189 12.063 4.31694 12.1047C5.41337 13.933 7.88789 17 11.9999 17ZM21.3982 13.1334C20.2099 15.1148 17.215 19 11.9999 19C6.78492 19 3.79002 15.1148 2.60173 13.1334C2.17947 12.4292 2.17947 11.5708 2.60173 10.8666C3.79002 8.88521 6.78492 5 11.9999 5C17.215 5 20.2099 8.88521 21.3982 10.8666C21.8204 11.5708 21.8204 12.4292 21.3982 13.1334Z" fill=""/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13ZM12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill=""/>
                                                    </svg>
                                                    <div class="text text_small clamp_1">34K</div>
                                                </div> 
                                                <div class="slash"></div> 
                                                <div class="flex_start_center gap_05">
                                                    <svg class="svg_fill" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3727 6.61438C8.91481 5.12854 6.5591 5.12854 5.10121 6.61438C3.63293 8.1108 3.63293 10.5447 5.10121 12.0411L11.2862 18.3447C11.6782 18.7442 12.3218 18.7442 12.7138 18.3447L18.8988 12.0411C20.3671 10.5447 20.3671 8.1108 18.8988 6.61438C17.4409 5.12854 15.0852 5.12854 13.6273 6.61438L12.7138 7.5454C12.5257 7.73706 12.2685 7.84504 12 7.84504C11.7315 7.84504 11.4743 7.73706 11.2862 7.5454L10.3727 6.61438ZM11.8003 5.21366L12 5.41721L12.1997 5.21366C14.4416 2.92878 18.0845 2.92878 20.3264 5.21366C22.5579 7.48794 22.5579 11.1676 20.3264 13.4419L14.1414 19.7454C12.9654 20.944 11.0346 20.944 9.85864 19.7454L3.67364 13.4419C1.44212 11.1676 1.44212 7.48794 3.67364 5.21366C5.91553 2.92878 9.55838 2.92878 11.8003 5.21366Z" fill=""/>
                                                    </svg>
                                                    <div class="text text_small clamp_1">201</div>
                                                </div>        
                                            </div>
                                            <div class="flex_start_center actions_card">
                                                <div class="text text_small" wire:click.stop='edit("{{$meal->id}}")'>
                                                    <svg class="svg_fill" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5356 3.8076C15.7071 2.63602 17.6066 2.63602 18.7782 3.8076L20.1924 5.22181C21.364 6.39338 21.364 8.29288 20.1924 9.46445L9.7999 19.857C9.6603 19.9966 9.4825 20.0917 9.28891 20.1304L3.98561 21.1911C3.28589 21.331 2.66897 20.7141 2.80892 20.0144L3.86958 14.7111C3.90829 14.5175 4.00345 14.3397 4.14305 14.2001L14.5356 3.8076ZM17.364 5.22181L18.7782 6.63602C19.1687 7.02655 19.1687 7.65971 18.7782 8.05024L17.364 9.46445L14.5356 6.63603L15.9498 5.22181C16.3403 4.83129 16.9735 4.83129 17.364 5.22181ZM13.1213 8.05024L5.77136 15.4002L5.06425 18.9358L8.59978 18.2286L15.9498 10.8787L13.1213 8.05024Z" fill=""/>
                                                    </svg> 
                                                </div>
                                                <div class="slash sm x"></div>
                                                <div class="text text_small" wire:click.stop='deleteThis("{{$meal->id}}")'>
                                                    <svg class="svg_fill" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10C10.5523 10 11 10.4477 11 11V16C11 16.5523 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V11C9 10.4477 9.44772 10 10 10Z" fill="#6F767E"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10C14.5523 10 15 10.4477 15 11V16C15 16.5523 14.5523 17 14 17C13.4477 17 13 16.5523 13 16V11C13 10.4477 13.4477 10 14 10Z" fill="#6F767E"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2C8.34315 2 7 3.34315 7 5H4H3C2.44772 5 2 5.44772 2 6C2 6.55228 2.44772 7 3 7H4V19C4 20.6569 5.34315 22 7 22H17C18.6569 22 20 20.6569 20 19V7H21C21.5523 7 22 6.55228 22 6C22 5.44772 21.5523 5 21 5H20H17C17 3.34315 15.6569 2 14 2H10ZM15 5C15 4.44772 14.5523 4 14 4H10C9.44772 4 9 4.44772 9 5H15ZM7 7H6V19C6 19.5523 6.44772 20 7 20H17C17.5523 20 18 19.5523 18 19V7H17H7Z" fill=""/>
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
                </article>

            </div> 
            @component('widgets.categories.filter')@endcomponent

        </article>     
    </section>

    @if ($delete)
        @component('widgets.categories.confirm')@endcomponent
    @endif 
    
</div>

