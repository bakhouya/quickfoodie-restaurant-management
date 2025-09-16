
    <div class="priview_files" wire:loading.remove wire:target='images' wire:animation>
        @foreach ($collections as $index => $image)
            <div class="item_file">
                <img src="{{asset("storage/".$image->image)}}">
                <button class="btn_remove" type="button" wire:click="removeImageInData({{$image->id}})">
                    <text class="text_small">X</text>
                </button>
            </div>
        @endforeach
    </div>