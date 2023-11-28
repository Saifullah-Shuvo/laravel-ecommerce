@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="prev page-numbers" href="#"><i class="fa fa-arrow-left"></i></a>
                </li>
            @else
                <li>
                    <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')"><i class="fa fa-arrow-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-number current active" aria-current="page">
                                <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}"
                        rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-arrow-right"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a>
                </li>
            @endif

        </ul>
    </nav>
@endif


{{-- <ul class="page-numbers">

    <li><a class="prev page-numbers" href="#"><i class="fa fa-arrow-left"></i></a></li>

    <li><span class="page-numbers current">1</span></li>
    <li><a class="page-numbers" href="#">2</a></li>
    <li><a class="page-numbers" href="#">3</a></li>

    <li><a class="next page-numbers" href="#"><i class="fa fa-arrow-right"></i></a></li>

</ul> --}}
