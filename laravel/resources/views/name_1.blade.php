<ul class="pagination">
    @if ($getListForCategory->currentPage() !== 1)
        <li><a href="{{ $getListForCategory->url(1) }}#list-category">&laquo;</a></li>
    @endif

    @php
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($getListForCategory->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $getListForCategory->lastPage());
    @endphp

    @if ($start > 1)
        <li><a href="{{ $getListForCategory->url(1) }}#list-category">1</a></li>
        @if ($start > 2)
            <li><span>...</span></li>
        @endif
    @endif

    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $getListForCategory->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
        @else
            <li><a href="{{ $getListForCategory->url($page) }}#list-category">{{ $page }}</a></li>
        @endif
    @endfor

    @if ($end < $getListForCategory->lastPage())
        @if ($end < $getListForCategory->lastPage() - 1)
            <li><span>...</span></li>
        @endif
        <li><a href="{{ $getListForCategory->url($getListForCategory->lastPage()) }}#list-category">{{ $getListForCategory->lastPage() }}</a></li>
    @endif

    @if ($getListForCategory->currentPage() !== $getListForCategory->lastPage())
        <li><a href="{{ $getListForCategory->nextPageUrl() }}#list-category">&raquo;</a></li>
    @endif
</ul>