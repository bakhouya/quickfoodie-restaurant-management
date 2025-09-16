<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between paginate_primary mt_15">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="btn btn_default">
                        <div class="text text_secoundry grey_text"> privew </div>
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn_primary">
                        <div class="text text_secoundry"> privew </div>
                    </button>
                @endif
            </span>
 
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn_primary">
                        <div class="bx bxs-chevron-right"></div>
                        <div class=" text text_secoundry">suivant </div>
                    </button>
                @else
                    <span class="btn btn_default">
                        <div class="bx bxs-chevron-right"></div>
                        <div class="text text_secoundry grey_text">suivant </div>
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>