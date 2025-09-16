@if ($collections != [])
    <div class="priview_files" wire:loading.remove wire:target='images' wire:animation>
        @foreach ($collections as $index => $image)
            <div class="item_file">
                <img src="{{$image->temporaryUrl()}}" alt="">
                <button class="btn_remove" type="button" wire:click="removeImageInArray({{$index}})">
                    <text class="text_small">X</text>
                </button>
            </div>
        @endforeach
    </div>
@endif
