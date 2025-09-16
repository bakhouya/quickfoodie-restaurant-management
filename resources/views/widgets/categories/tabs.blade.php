

<div class="flex_center_center">
    @foreach (langHelper::getLanguages() as $lang)
        <button class="tabs_btn @if($locale == $lang->locale) active @endif" type="button" 
            wire:click='changeTabs("{{$lang->locale}}")'>
            <img src="{{asset("storage/".$lang->image)}}">
        </button>
        @if ($lang->id < langHelper::getLanguages()->count())
            <div class="slash"></div>
        @endif        
    @endforeach
</div>