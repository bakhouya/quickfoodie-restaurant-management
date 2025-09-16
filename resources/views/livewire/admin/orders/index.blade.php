<div>
    <section class="main_container">
        <!-- @component('widgets.articles.filter')@endcomponent -->
        <article class="section_page">

            <div class="container_cards active">
                <div class="header_primary">
                   <div class="flex_start_center gap_05">
                        <div class="flex_start_center text_click @if($tabs == 1) active @endif" wire:click='changeTabs("1")'>
                            <div class="text text_secoundary">attendre</div>
                        </div>
                        <div class="slash"></div>
                        <div class="flex_start_center text_click @if($tabs == 2) active @endif" wire:click='changeTabs("2")'>
                            <div class="text text_secoundary">commandes</div>
                        </div>
                        <div class="slash"></div>
                        <div class="flex_start_center text_click @if($tabs == 3) active @endif" wire:click='changeTabs("3")'>
                            <div class="text text_secoundary">confirmer</div>
                        </div>
                   </div>
                   <div class="flex_start_center text_click">
                        <div class="text text_secoundary">order BY</div>
                    </div>
                </div>
                <div class="hr_card"></div>
                <div class="cards_primary">
                    @if ($loading)
                        @component('components.leaders.leader-center')@endcomponent
                    @else 
                        @component('widgets.orders.order')@endcomponent  
                    @endif
                    
                </div>
            </div>
            @component('widgets.orders.filter')@endcomponent
            
        </article>
    </section>


    @if ($infOrder)
        @livewire('admin.orders.info') 
    @endif
    
    
    
</div>
