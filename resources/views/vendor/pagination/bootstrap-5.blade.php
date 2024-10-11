@if ($paginator->hasPages())
    <div class="pagination font-alt">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @if ($paginator->lastPage() > 5)
            {{-- Always show the first page --}}
            <a href="{{ $paginator->url(1) }}">1</a>

            {{-- Show dots if current page is greater than 3 --}}
            @if ($paginator->currentPage() > 3)
                <span class="disabled">...</span>
            @endif

            {{-- Show pages around current page --}}
            @foreach (range(max(2, $paginator->currentPage() - 1), min($paginator->lastPage() - 1, $paginator->currentPage() + 1)) as $page)
                @if ($page == $paginator->currentPage())
                    <a class="active" href="#">{{ $page }}</a>
                @else
                    <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Show dots if current page is less than last page - 2 --}}
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                <span class="disabled">...</span>
            @endif

            {{-- Always show the last page --}}
            <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
        @else
            {{-- If less than or equal to 5 pages, show all pages --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="disabled">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active" href="#">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right"></i></a>
        @endif
    </div>
@endif
