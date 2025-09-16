
@extends('pages.admin.settings.web.layout')

@section('settings')
    <div class="wrapper_settings">
        <div class="box_settings">
            <div class="">
                <div class="text text_secoundary">settings platform</div>
                <div class="text text_small">Controls auto save of editors that have unsaved changes.</div>
            </div>
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.order_details"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.logout_confirmation"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.order_status"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.payment_status"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.payment_status"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.payment_status"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
            @component('widgets.settings.web.option',[
                "field"=>"order",
                "title"=>__("app.payment_status"),
                "subTitle"=>__("app.logout_confirmation")
            ]) @endcomponent
        </div>
    </div>
@endsection