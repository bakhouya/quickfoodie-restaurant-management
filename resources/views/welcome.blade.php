@extends('master.layouts.panel.layout')

@section('container')

    <main class="main_page">

        @livewire('admin.header.header')
        {{-- @component('components.models.model')@endcomponent --}}
        <section class="main_container">

            <article class="container_primary">
                {{-- @component('components.form.rating', [
                        "model" => "" ,
                ])@endcomponent --}}
                {{-- <div class="grid_1 gap_1">
                    @component('components.alerts.alert-primary', [
                        "text" => "please check your email confirmation from " ,
                        "type" => "alert_primary" ,
                    ])@endcomponent
                    @component('components.alerts.alert-primary', [
                        "text" => "please check your email confirmation from " ,
                        "type" => "alert_default" ,
                    ])@endcomponent
                    @component('components.alerts.alert-primary', [
                        "text" => "please check your email confirmation from " ,
                        "type" => "alert_secoundary" ,
                    ])@endcomponent
                    @component('components.alerts.alert-primary', [
                        "text" => "please check your email confirmation from " ,
                        "type" => "alert_danger" ,
                    ])@endcomponent
                    @component('components.alerts.alert-primary', [
                        "text" => "please check your email confirmation from " ,
                        "type" => "alert_success" ,
                    ])@endcomponent
                </div> --}}
                <div class="">

                    <div class="header_form">
                        <div class="text text_primary">creation compte</div>
                    </div>

                    <div class="card_form">

                        <div class="header_card_form flex_between_center">
                            <div class="">
                                <div class="text text_primary">Shoose Your lang</div>
                            </div>
                            <div class="flex_start_center gap_05">
                                <button class="tabs_btn" type="button">
                                    <img src="{{asset("assets/media/lang/ma.png")}}">
                                </button>
                                <div class="slash"></div>
                                <button class="tabs_btn" type="button">
                                    <img src="{{asset("assets/media/lang/mf.png")}}">
                                </button>
                                <div class="slash"></div>
                                <button class="tabs_btn active" type="button">
                                    <img src="{{asset("assets/media/lang/gb.png")}}">
                                </button>
                            </div>
                        </div>
                        @component('components.form.field-file', [
                                "type" => "text",
                                "field" => "Name & Fullname",
                                "model" => "images",
                        ])@endcomponent
                        
                        @component('components.form.field-input', [
                                "type" => "text",
                                "field" => "Name & Fullname",
                                "model" => "data.name",
                        ])@endcomponent
                        @component('components.form.field-input', [
                                "type" => "text",
                                "field" => "Description",
                                "model" => "data.name",
                        ])@endcomponent
                        <div class="grid_2 gap_secoundary">
                            @component('components.form.field-group', [
                                    "type" => "text",
                                    "field" => "Price Normal",
                                    "model" => "data.name",
                            ])@endcomponent
                            @component('components.form.field-group', [
                                "type" => "text",
                                "field" => "Price vender",
                                "model" => "data.name",
                            ])@endcomponent
                        </div>
                        
                    </div>

                    <div class="header_form">
                        <div class="text text_primary">confidentialité du seo </div>
                    </div>

                    <div class="card_form">

                        @component('components.form.field-input', [
                                "type" => "text",
                                "field" => "Title Seo",
                                "model" => "data.name",
                        ])@endcomponent
                         @component('components.form.field-input', [
                                "type" => "text",
                                "field" => "Description Seo",
                                "model" => "data.name",
                        ])@endcomponent
                        @component('components.form.field-tags', [
                                "type" => "text",
                                "field" => "Name & Fullname",
                                "model" => "data.name",
                        ])@endcomponent
                       <div class="footer_card_form">
                            <label foe="status" class="field_status flex_between_center">
                                <div class="">
                                    <div class="text text_secoundary">Status</div>
                                    <div class="text text_small">are you sure you want publish this item</div>
                                </div>
                                @component('components.form.check' , [
                                            "type" => "checkbox",
                                            "field" => "status" ,
                                            "model" => "data.status",]) 
                                @endcomponent
                            </label>
                       </div>

                    </div>

                </div>

                <div class="grid_2 gap_secoundary mt_08">
                    <button class="btn btn_primary" type="button">
                        <div class="text text_secoundary"> {{__("app.add_item")}} </div>
                    </button>
                    <button class="btn btn_danger" type="reset">
                        <div class="text text_secoundary"> {{__("app.cancel")}} </div>
                    </button>
                </div>
            </article>

            <article class="container_secoundary">
                <div class="item"><img src="{{asset("assets/media/posts/e-2.jpg")}}" alt=""></div>
                <div class="item"></div>
            </article>
            
        </section>

        

    </main>

@endsection
