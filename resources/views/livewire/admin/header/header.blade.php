<header class="header">
    
    <div class="flex_start_center gap_1">
        <div class="">
            <div class="text text_secoundary">{{$title}}</div>
            <div class="text text_small">{{$subTitle}}</div>
        </div>
    </div>

    <div class="flex_end_center actions">
        
        @livewire('admin.header.chat')
        <div class="slash"></div>
        @livewire('admin.header.notification')
        <div class="slash"></div>
        @livewire('admin.header.acount')
        
    </div>
</header>
