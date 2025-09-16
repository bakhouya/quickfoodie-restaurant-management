@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">   
        @livewire('admin.header.header', ["title"=> __("app.settings"), "subTitle"=> __("app.welcome")]) 
        <div class="settings_container">
            {{-- <div class="header_primary p_sticky flex_between_center">
                <div class="flex_start_center gap_1">
                    <div class="text_click text text_secoundary grey_text active">Content settings</div>
                    <div class="slash"></div>
                    <div class="text_click text text_secoundary grey_text">authresation</div>
                </div>
                <div class="flex_start_center">
                    <div class="text_click text text_secoundary grey_text">touts settings</div>
                </div>
            </div> --}}
            <div class="body_container_settings">
                
                <div class="nav_settings nav_items">
                    @component('widgets.components.item-nav',[
                        "route"=> route("content"),
                        "text"=>"générals settings",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("media-social"),
                        "text"=>"social média",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("order-settings"),
                        "text"=>"orders settings",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("materials"),
                        "text"=>"materials",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>"",
                        "text"=>"chat",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("languages"),
                        "text"=>"languages",
                    ])@endcomponent
                </div>
                <div class="settings_container">
                    @yield('settings')
                </div>
            </div>
        </div> 
    </main>

@endsection