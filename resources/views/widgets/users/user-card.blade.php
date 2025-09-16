<card class="card @if(in_array($user->id, $selectionList)) selected @endif" 
    @if($selection) wire:click.stop='selectThisItem("{{$user->id}}")' @endif>

    <div class="header_card flex_center_center">
        <div class="avatar_primary sd m_auto">
            @if ($user->image)
                <img src="{{asset("assets/media/users/".$user->id.".png")}}" alt="" class="item">
            @else
                <div class="text headline_primary primary_color">{{substr($user->name, 0, 1)}} </div>
            @endif
        </div>
    </div>
    <div class="body_card">
        <div class="cotent_body_card">
            <div class="flex_between_center">
                <div class="flex_start_center gap_1">
                    <div class="text text_secoundary">
                        {{Str::limit($user->name, 30)}}
                    </div>
                    @if ($user->status == true )
                        <div class="text text_small primary_color">
                            active
                        </div>
                    @else
                        <div class="text text_small danger_color">
                            Off stocke
                        </div>
                    @endif
                    
                </div>
                <div class="text text_small">
                    {{$user->updated_at->format("H:m")}}
                </div>
            </div>
            <div class="flex_between_center mt_05">
                <div class="flex_start_center">
                    <div class="text text_small clamp_1">{{$user->email}}</div>
                    <div class="slash"></div>
                    @foreach ($user->roles as $role)
                        <div class="text text_small clamp_1">{{$role->name}}</div>
                    @endforeach                   
                </div>
                <div class="flex_start_center">
                    <div class="slash sm x"></div>
                    <div class="text text_small" wire:click.stop='edit("{{$user->id}}")'>
                        <svg class="svg_fill" height="19" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5356 3.8076C15.7071 2.63602 17.6066 2.63602 18.7782 3.8076L20.1924 5.22181C21.364 6.39338 21.364 8.29288 20.1924 9.46445L9.7999 19.857C9.6603 19.9966 9.4825 20.0917 9.28891 20.1304L3.98561 21.1911C3.28589 21.331 2.66897 20.7141 2.80892 20.0144L3.86958 14.7111C3.90829 14.5175 4.00345 14.3397 4.14305 14.2001L14.5356 3.8076ZM17.364 5.22181L18.7782 6.63602C19.1687 7.02655 19.1687 7.65971 18.7782 8.05024L17.364 9.46445L14.5356 6.63603L15.9498 5.22181C16.3403 4.83129 16.9735 4.83129 17.364 5.22181ZM13.1213 8.05024L5.77136 15.4002L5.06425 18.9358L8.59978 18.2286L15.9498 10.8787L13.1213 8.05024Z" fill=""/>
                        </svg> 
                    </div>
                </div>        
            </div>
            
        </div>
    </div>
</card> 