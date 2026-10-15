@if ($paginator->hasPages())
    <div style="display:flex; gap:15px; justify-content:center; align-items:center;">

        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();

            $start = max(1, min($current - 1, $last - 2));
            $end = min($last, $start + 2);
        @endphp

        @if ($paginator->onFirstPage())
            <span style="color:#999;"><i class="fa fa-angle-left"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
        @endif

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $current)
                <span style="font-weight:bold;">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}">
                    {{ $page }}
                </a>
            @endif
        @endfor

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
        @else
            <span style="color:#999;"><i class="fa fa-angle-right"></i></span>
        @endif

    </div>
@endif