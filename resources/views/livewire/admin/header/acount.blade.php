<div>
    <div class="avatar_primary @auth active @endauth" wire:click='showBox'>
        @if (auth()->user()->image)
            <img src="{{asset("assets/media/20.png")}}" alt="">
        @else
            <div class="text headline_primary">{{Str::substr(auth()->user()->name,0,1)}} </div>
        @endif
    </div>
    @if ($box)

        <div class="box_account" wire:blur='hideBox'>
            <div class="box_item @if ($step == 1) active @endif">
                <div class="header_box_account">
                    <div class="avatar_primary lg m_auto  @auth active @endauth">
                        @if (auth()->user()->image)
                            <img src="{{asset("assets/media/20.png")}}" alt="">
                        @else
                            <div class="text headline_section">{{Str::substr(auth()->user()->name,0,1)}} </div>
                        @endif
                        {{-- <label for="avatar" class="edit_avatar">
                            <input type="file" hidden id="avatar">
                            <svg class="svg_fill" width="20"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5356 3.8076C15.7071 2.63602 17.6066 2.63602 18.7782 3.8076L20.1924 5.22181C21.364 6.39338 21.364 8.29288 20.1924 9.46445L9.7999 19.857C9.6603 19.9966 9.4825 20.0917 9.28891 20.1304L3.98561 21.1911C3.28589 21.331 2.66897 20.7141 2.80892 20.0144L3.86958 14.7111C3.90829 14.5175 4.00345 14.3397 4.14305 14.2001L14.5356 3.8076ZM17.364 5.22181L18.7782 6.63602C19.1687 7.02655 19.1687 7.65971 18.7782 8.05024L17.364 9.46445L14.5356 6.63603L15.9498 5.22181C16.3403 4.83129 16.9735 4.83129 17.364 5.22181ZM13.1213 8.05024L5.77136 15.4002L5.06425 18.9358L8.59978 18.2286L15.9498 10.8787L13.1213 8.05024Z" fill="#F9F9F9"/>
                            </svg>
                        </label> --}}
                    </div>
                    <div class="text text_secoundary mt_05">{{auth()->user()->name}} </div>
                    <div class="text text_small primary_color">
                        @forelse (auth()->user()->roles as $role)
                            {{$role->name}}
                        @empty
                            <div class="">null</div>
                        @endforelse
                    </div>
                </div>
                <div class="body_box_account">
                    <div class="link_primary">
                        <svg class="svg_stroke" width="24" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.80762 37.7938C9.80762 33.698 13.0392 28.5979 22.3523 28.5979C31.6655 28.5979 34.897 33.6613 34.897 37.7589" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.353 22.7422C26.7786 22.7422 30.3662 19.1546 30.3662 14.729C30.3662 10.3034 26.7786 6.71582 22.353 6.71582C17.9275 6.71582 14.3398 10.3034 14.3398 14.729C14.3398 19.1546 17.9275 22.7422 22.353 22.7422Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text text_secoundary">{{__('app.profile')}} </div>
                    </div>
                    <div class="link_primary" wire:click='settings'>
                        <svg class="svg_fill" width="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14ZM16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12Z" fill=""/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3791 3L10.9915 4.16266C10.6165 5.28756 9.79908 6.07025 8.96536 6.53447C8.90606 6.56749 8.84735 6.60145 8.78923 6.63634C7.96925 7.12859 6.88111 7.44611 5.71804 7.20811L4.51627 6.96218L4.91723 5.00278L6.11901 5.24871C6.68428 5.36439 7.26514 5.21857 7.75983 4.9216C7.83655 4.87554 7.91408 4.83069 7.9924 4.78709C8.49591 4.50673 8.91189 4.07694 9.09413 3.53021L9.48168 2.36754C9.75391 1.55086 10.5182 1 11.3791 1H12.621C13.4819 1 14.2462 1.55086 14.5184 2.36754L14.9059 3.53021C15.0882 4.07694 15.5042 4.50673 16.0077 4.78709C16.086 4.83069 16.1635 4.87554 16.2402 4.92159C16.7349 5.21857 17.3158 5.36438 17.881 5.2487L19.0828 5.00279C19.9262 4.8302 20.7854 5.21666 21.2158 5.96218L21.8368 7.03775C22.2672 7.78328 22.1723 8.72059 21.6011 9.36469L20.7862 10.2838C20.4042 10.7144 20.2392 11.2888 20.2483 11.8644C20.2497 11.9548 20.2497 12.0452 20.2483 12.1356C20.2392 12.7111 20.4042 13.2855 20.7862 13.7162L21.6011 14.6352C22.1723 15.2793 22.2672 16.2167 21.8368 16.9622L21.2158 18.0378C20.7854 18.7833 19.9262 19.1697 19.0828 18.9971L17.8811 18.7512C17.3158 18.6356 16.735 18.7814 16.2403 19.0784C16.1635 19.1244 16.086 19.1693 16.0077 19.2129C15.5042 19.4933 15.0882 19.9231 14.9059 20.4698L14.5184 21.6325C14.2462 22.4491 13.4819 23 12.621 23H11.3791C10.5182 23 9.75391 22.4491 9.48169 21.6325L9.09413 20.4698C8.91189 19.9231 8.49591 19.4933 7.9924 19.2129C7.91406 19.1693 7.83651 19.1244 7.75977 19.0784C7.26507 18.7814 6.68421 18.6356 6.11892 18.7512L4.91723 18.9971C4.07385 19.1697 3.21465 18.7833 2.78422 18.0378L2.16324 16.9622C1.73281 16.2167 1.82773 15.2793 2.39888 14.6352L3.89529 15.9622L4.51627 17.0378L5.71796 16.7918C6.88105 16.5538 7.9692 16.8714 8.78918 17.3636C8.84732 17.3985 8.90605 17.4325 8.96536 17.4655C9.79908 17.9298 10.6165 18.7124 10.9915 19.8373L11.3791 21L12.621 21L13.0086 19.8373C13.3835 18.7124 14.201 17.9298 15.0347 17.4655C15.094 17.4325 15.1527 17.3985 15.2109 17.3636C16.0309 16.8714 17.119 16.5538 18.2821 16.7919L19.4837 17.0378L20.1047 15.9622L19.2898 15.0431C18.505 14.1581 18.2334 13.0606 18.2486 12.1039C18.2497 12.0346 18.2497 11.9653 18.2486 11.8961C18.2334 10.9394 18.505 9.8418 19.2898 8.95681L20.1047 8.03775L19.4837 6.96218L18.282 7.2081C17.1189 7.4461 16.0308 7.12858 15.2108 6.63633C15.1527 6.60145 15.094 6.56749 15.0347 6.53447C14.201 6.07025 13.3835 5.28756 13.0086 4.16266L12.621 3L11.3791 3ZM2.39888 14.6352L3.89529 15.9622L4.71031 15.0431C5.49507 14.1581 5.76666 13.0605 5.75151 12.1039C5.75041 12.0346 5.75041 11.9653 5.75151 11.8961C5.76667 10.9394 5.49508 9.84185 4.71032 8.95687L3.89529 8.03775L4.51627 6.96218L4.91723 5.00278C4.07385 4.8302 3.21465 5.21665 2.78422 5.96218L2.16324 7.03775C1.73281 7.78328 1.82773 8.72059 2.39888 9.36469L3.21391 10.2838C3.59582 10.7145 3.76088 11.2889 3.75176 11.8644C3.75033 11.9548 3.75033 12.0452 3.75176 12.1355C3.76087 12.7111 3.59582 13.2854 3.21391 13.7161L2.39888 14.6352Z" fill=""/>
                        </svg>
                        <div class="text text_secoundary">{{__("app.settings")}} </div>
                    </div>
                    <div class="link_primary">
                        <svg class="svg_stroke" width="23" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.9634 16.689L24.8024 23.325C23.2605 24.5483 21.0911 24.5483 19.5492 23.325L11.3193 16.689" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.1381 39.0027C36.7241 39.0182 40.489 34.4286 40.489 28.7877V16.1726C40.489 10.5317 36.7241 5.94214 31.1381 5.94214H13.1058C7.51974 5.94214 3.75488 10.5317 3.75488 16.1726V28.7877C3.75488 34.4286 7.51974 39.0182 13.1058 39.0027H31.1381Z" stroke="" stroke-width="2.75506" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text text_secoundary">des messages </div>
                    </div>
                    <div class="link_primary" wire:click='logout'>
                        <svg class="svg_stroke danger" width="27" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.2033 7.84833V7.07083C15.2033 5.375 13.8283 4 12.1325 4H8.07C6.375 4 5 5.375 5 7.07083V16.3458C5 18.0417 6.375 19.4167 8.07 19.4167H12.1408C13.8317 19.4167 15.2033 18.0458 15.2033 16.355V15.5692" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.8642 11.7084H10.8301" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.4248 9.27905L20.8648 11.7082L18.4248 14.1382" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="text text_secoundary danger_color">{{__("app.logout")}} </div>
                    </div>
                </div>
            </div>
            <div class="box_item @if ($step == 2) active @endif">
                <div class="header_box flex_start_center gap_1">
                    <button class="btn_icon default" type="button" wire:click='closeStep'>
                        <svg class="svg_fill" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.7071 19.2071C16.0976 18.8166 16.0976 18.1834 15.7071 17.7929L9.91421 12L15.7071 6.20711C16.0976 5.81658 16.0976 5.18342 15.7071 4.79289C15.3166 4.40237 14.6834 4.40237 14.2929 4.79289L8.5 10.5858C7.71895 11.3668 7.71895 12.6332 8.5 13.4142L14.2929 19.2071C14.6834 19.5976 15.3166 19.5976 15.7071 19.2071Z" fill=""/>
                        </svg>
                    </button>
                    <div class="text headline_secoundary">{{__("app.settings")}} </div>
                </div>
                <div class="body_box_account">
                    <div class="text text_secoundary mt_08 mb_08">theme mode</div>
                    <div class="grid_2 gap_secoundary">
                        @for ($i = 1; $i < 5 ; $i++)
                            <div class="card_mode dark_{{$i}}" wire:click="changeMode('{{$i}}')">
                                <div class="header_mode"></div>
                            </div>
                        @endfor                       
                    </div>
                </div>
            </div>
        </div>
            
    @endif
</div>
