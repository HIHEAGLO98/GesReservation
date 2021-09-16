@if ($paginator->hasPages())
    <nav class="pgn">
        <ul>
            {{-- Previous Page Link --}}
            <li>
                @if ($paginator->onFirstPage())
                    <span class="pgn__prev inactive" href="#0">@lang('Prev')</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="pgn__prev" rel="prev">@lang('Prev')</a>
                @endif
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pgn__num current">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span class="pgn__num current">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="pgn__num">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif

            @endforeach

            {{-- Next Page Link --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"  class="pgn__next" rel="next">@lang('Next')</a>
                @else
                    <span class="pgn__next inactive">@lang('Next')</span>
                @endif
            </li>
        </ul>
    </nav>
@endif