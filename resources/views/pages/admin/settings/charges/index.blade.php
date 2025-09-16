@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">   
        @livewire('admin.header.header', ["title"=> __("app.settings"), "subTitle"=> __("app.welcome")]) 
        <div class="settings_container">
            <div class="body_container_settings">               
                <div class="nav_settings nav_items">
                    @component('widgets.components.item-nav',[
                        "route"=>route("branches"),
                        "text"=>"branches brand",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("supplier"),
                        "text"=>"supplier",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("materials"),
                        "text"=>"materials charge",
                    ])@endcomponent
                    @component('widgets.components.item-nav',[
                        "route"=>route("costs"),
                        "text"=>"costs ",
                    ])@endcomponent
                </div>
                <div class="settings_container">
                    @yield('settings')
                </div>               
            </div>
        </div> 
    </main>

@endsection