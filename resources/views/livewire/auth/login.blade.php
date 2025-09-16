<div class="auth_container">
    
    <div class="fixed" wire:loading wire:target='login'>
        @component('components.leaders.leader-1')@endcomponent
    </div>
    <div class="box_tranform_auth first">
        <img src="{{asset("assets/media/food/banner-1.jpg")}}" alt="">
    </div>
    <div class="traslate_card">

        <div class="card_auth">
            <div class="header_auth">
                <div class="text title_auth">connection</div>
                <img src="{{asset("assets/media/logo-2.png")}}" alt=""> 
            </div>
            <div class="body_card_auth grid_1 gap_secoundary">
                @component('components.form.field-input', [
                    "type" => "text",
                    "field" => "email",
                    "model" => "data.email",
                ])@endcomponent
                @component('components.form.field-input', [
                    "type" => "password",
                    "field" => "password",
                    "model" => "data.password",
                ])@endcomponent
            </div>
            <div class="footer_card_auth grid_1">
                <button class="btn btn_primary" type="button" wire:click='login'>
                    <div class="text text_secoundary light_text">Login</div>
                </button>
            </div>
            <div class="m_auto text text_secoundary grey_text text_click">forget password</div>
        </div>

    </div> 
    <div class="box_tranform_auth last">
        <img src="{{asset("assets/media/food/banner-2.jpg")}}" alt="">
    </div>
</div>
