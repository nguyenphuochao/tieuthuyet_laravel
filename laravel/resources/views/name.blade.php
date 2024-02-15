<ul class="pagination">
    @if ($chapters->currentPage() !== 1)
        <li><a href="{{ $chapters->url(1) }}#list-chapter">&laquo;</a></li>
    @endif

    @php
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($chapters->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $chapters->lastPage());
    @endphp

    @if ($start > 1)
        <li><a href="{{ $chapters->url(1) }}#list-chapter">1</a></li>
        @if ($start > 2)
            <li><span>...</span></li>
        @endif
    @endif

    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $chapters->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
        @else
            <li><a href="{{ $chapters->url($page) }}#list-chapter">{{ $page }}</a></li>
        @endif
    @endfor

    @if ($end < $chapters->lastPage())
        @if ($end < $chapters->lastPage() - 1)
            <li><span>...</span></li>
        @endif
        <li><a href="{{ $chapters->url($chapters->lastPage()) }}#list-chapter">{{ $chapters->lastPage() }}</a></li>
    @endif

    @if ($chapters->currentPage() !== $chapters->lastPage())
        <li><a href="{{ $chapters->nextPageUrl() }}#list-chapter">&raquo;</a></li>
    @endif
</ul>
