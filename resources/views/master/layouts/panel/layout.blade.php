@component('master.include.head')@endcomponent


<section class="main_body"> 
    @livewire('admin.sidbar.sidbar')
    <div class="alert_message success">
        <div class="text text_secoundary">Lorem ipsum dolor sit amet.</div>
    </div>
    <audio id="successSound" src="{{ asset("assets/soon/success-83493.mp3") }}"></audio>
    {{-- <audio id="errorSound" src="{{ asset('sounds/error.mp3') }}"></audio> --}}
    @yield('container')    
</section>


@component('master.include.script')@endcomponent