@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled"><a class="page-link" style="color: gray">Previous</a></li>
        @else
        <li class="page-item" wire:click='previousPage'><a class="page-link" style="color: blue">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" wire:click="gotoPage({{ $page }})">
                            <a class="page-link">{{ $page }}<span class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="page-item" wire:click="gotoPage({{ $page }})"><a class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item" wire:click='nextPage'><a class="page-link" style="color: blue">Next</a></li>
        @else
        <li class="page-item disabled"><a class="page-link" style="color: gray">Next</a></li>
        @endif

    </ul>
</nav>
@endif