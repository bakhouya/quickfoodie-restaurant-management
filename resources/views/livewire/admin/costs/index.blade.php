<section class="costs_container">
   
    @component('widgets.costs.nav', ['collection'=>$this->materials])@endcomponent
    @component('widgets.costs.index' ,['collection'=>$costs, 'data'=>$this->data])@endcomponent


    @if ($select)
        @component('widgets.costs.select', ['collection'=>$this->assets])@endcomponent
    @endif
    @if ($model)
        @component('widgets.costs.create', ['typeModel'=>$this->typeModel])@endcomponent
    @endif
</section>
