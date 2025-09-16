@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">
        
        @livewire('admin.header.header', ["title"=>__("app.settings"), "subTitle"=>__("app.welcome")])   
        <section class="main_container">
            <div class="settings_content"> 
                <a href="{{route("content")}}" class="card_setting" wire:navigate>
                    <div class="header_card_setting">
                        <img src="{{asset("assets/media/png/cloudpanel.png")}}" alt="">
                    </div>
                    <div class="body_card_setting">
                        <div class="text text_secoundary">settings platform</div>
                        <div class="text text_small clamp_1 mt_04">control des roles et permistion of users</div>
                    </div>
                </a>
                <div class="card_setting">
                    <div class="header_card_setting">
                        <img src="{{asset("assets/media/png/bing.png")}}" alt="">
                    </div>
                    <div class="body_card_setting">
                        <div class="text text_secoundary">content role</div>
                        <div class="text text_small clamp_1 mt_04">control des roles et permistion of users</div>
                    </div>
                </div>
                <a href="{{route("roles")}}" class="card_setting" wire:navigate>
                    <div class="header_card_setting">
                        <img src="{{asset("assets/media/png/cloudpanel.png")}}" alt="">
                    </div>
                    <div class="body_card_setting">
                        <div class="text text_secoundary">Role et permission</div>
                        <div class="text text_small clamp_1 mt_04">control des roles et permistion of users</div>
                    </div>
                </a>
                <div class="card_setting">
                    <div class="header_card_setting">
                        <img src="{{asset("assets/media/png/bing.png")}}" alt="">
                    </div>
                    <div class="body_card_setting">
                        <div class="text text_secoundary">gestion personnel</div>
                        <div class="text text_small clamp_1 mt_04">control des roles et permistion of users</div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection