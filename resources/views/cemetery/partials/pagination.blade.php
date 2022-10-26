<div class="cemeteries-buttons">
    {{--    <button type="button" class="button-more">Показать еще</button>--}}

    <div class="cemeteries-pagination">

        @if(request('NAME') && request('ADDRESS'))
            <a class="pagination-left"
               href="{{ $paginator->previousPageUrl() . '&NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS')}}"
               @if($paginator->onFirstPage()) style="pointer-events: none;" @endif
            >
                @else
                    <a class="pagination-left"
                       href="{{ $paginator->previousPageUrl() }}"
                       @if($paginator->onFirstPage()) style="pointer-events: none;" @endif
                    >
                        <svg class="left-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                        </svg>
                    </a>
                @endif
                <div class="pagination-number">
                    <span class="pagination-number__current">{{ $paginator->currentPage() }}</span>
                    <span class="pagination-number__delimiter">/</span>
                    <span class="pagination-number__all">{{ $paginator->lastPage() }}</span>
                </div>
                @if(request('NAME') && request('ADDRESS'))
                    <a class="pagination-right"
                       href="{{ $paginator->nextPageUrl() . '&NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}"
                       @if($paginator->currentPage() === $paginator->lastPage()) style="pointer-events: none;" @endif
                    >
                        @else
                            <a class="pagination-right"
                               href="{{ $paginator->nextPageUrl() }}"
                               @if($paginator->currentPage() === $paginator->lastPage()) style="pointer-events: none;" @endif >
                        <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                        </svg>
                    </a>
        @endif
    </div>
</div>
