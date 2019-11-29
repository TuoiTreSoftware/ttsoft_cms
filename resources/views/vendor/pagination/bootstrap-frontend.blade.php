@if ($paginator->hasPages())
        {{-- Previous Page Link --}}
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-secondary">&larr; Previous</a>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="javascript:void()" class="btn btn-outline-secondary active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="btn btn-outline-secondary">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-dark">&rarr; Next</a>
    @endif
@endif
