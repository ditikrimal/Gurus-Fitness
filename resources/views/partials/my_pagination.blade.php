@if ($paginator->hasPages())
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;

        }

        .pagination .active {
            color: white;
            width: 35px;
            display: flex;
            font-size: 1rem;
            height: 35px;
            justify-content: center;
            align-items: center;
            background-color: #212226;
            border-radius: 50%;
            cursor: default;

        }

        .pagination .not-active a {
            font-size: 0.8rem;
            color: black;
            width: 30px;
            display: flex;
            height: 30px;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 50%;
        }

        [aria-disabled="true"] {
            color: white;
            width: 30px;
            display: flex;
            height: 30px;
            font-size: 1rem;
            justify-content: center;
            align-items: center;
            background-color: rgba(166, 166, 166, 0.778);
            border-radius: 50%;
            cursor: not-allowed;
        }

        [rel="prev"],
        [rel="next"] {
            color: black;
            width: 30px;
            display: flex;
            height: 30px;
            font-size: 0.9rem;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 50%;
        }
    </style>
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')" class="disabled">
                    <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i> </span>
                </li>
            @else
                <li>
                    <a aria-label="@lang('pagination.previous')" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                            class="fa-solid fa-angle-left"></i> </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page" class="active"><span>{{ $page }}</span></li>
                        @else
                            <li class="not-active"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a aria-label="@lang('pagination.next')" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                            class="fa-solid fa-angle-right"></i> </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')" class="disabled">
                    <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i> </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
