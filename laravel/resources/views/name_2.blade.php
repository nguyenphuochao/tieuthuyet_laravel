<ul class="pagination">
    @if ($data['stories']->currentPage() !== 1)
        <li><a href="{{ $data['stories']->url(1) }}">&laquo;</a></li>
    @endif

    @php
        $maxPages = 3; // Số trang tối đa bạn muốn hiển thị
        $start = max($data['stories']->currentPage() - floor($maxPages / 2), 1);
        $end = min($start + $maxPages - 1, $data['stories']->lastPage());
    @endphp

    @if ($start > 1)
        <li><a href="{{ $data['stories']->url(1) }}">1</a></li>
        @if ($start > 2)
            <li><span>...</span></li>
        @endif
    @endif

    @for ($page = $start; $page <= $end; $page++)
        @if ($page == $data['stories']->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
        @else
            <li><a href="{{ $data['stories']->url($page) }}">{{ $page }}</a></li>
        @endif
    @endfor

    @if ($end < $data['stories']->lastPage())
        @if ($end < $data['stories']->lastPage() - 1)
            <li><span>...</span></li>
        @endif
        <li><a href="{{ $data['stories']->url($data['stories']->lastPage()) }}">{{ $data['stories']->lastPage() }}</a></li>
    @endif

    @if ($data['stories']->currentPage() !== $data['stories']->lastPage())
        <li><a href="{{ $data['stories']->nextPageUrl() }}">&raquo;</a></li>
    @endif
</ul>