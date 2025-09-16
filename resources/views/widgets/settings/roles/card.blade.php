<card class="card @if(in_array($role->id, $selectionList)) selected @endif" 
    @if($selection) 
        wire:click.stop='selectThisItem("{{$role->id}}")' 
    @else
        wire:click.stop='hasPermissions("{{$role->id}}")' 
    @endif>

    <div class="header_card flex_center_center">
        <div class="avatar_primary sd m_auto">
            @if ($role->image)
                <img src="{{asset("assets/media/users/".$role->id.".png")}}" alt="" class="item">
            @else
                <div class="text headline_primary primary_color">{{substr($role->name, 0, 1)}} </div>
            @endif
        </div>
    </div>
    <div class="body_card">
        <div class="cotent_body_card">
            <div class="flex_between_center">
                <div class="flex_start_center gap_1">
                    <div class="text text_secoundary">
                        {{Str::limit($role->name, 30)}}
                    </div>
                    @if ($role->status == true )
                        <div class="text text_small primary_color">
                            active
                        </div>
                    @else
                        <div class="text text_small danger_color">
                            desactive
                        </div>
                    @endif
                    
                </div>
                <div class="text text_small">
                    {{$role->created_at->diffForHumans()}}
                </div>
            </div>
            <div class="flex_between_center mt_05">
                <div class="flex_start_center">
                    <div class="text text_small clamp_1">{{$role->description}}</div>                
                </div>
                <div class="flex_start_center">
                    <div class="slash"></div>
                    <div class="text text_small" wire:click.stop='edit("{{$role->id}}")'>
                        {{__("app.edit")}} 
                    </div>
                </div>   
            </div>
            
        </div>
    </div>
</card>