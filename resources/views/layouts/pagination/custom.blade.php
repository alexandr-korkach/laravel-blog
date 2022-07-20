@if ($paginator->hasPages())

    <nav class="col-lg-12">
        <ul class="page-numbers">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())

                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>

            @endif
        </ul>
    </nav>
@endif
