<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="disabled"><span><i class="fa fa-angle-double-left"></i> Prev</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left"></i> Prev</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next <i class="fa fa-angle-double-right"></i></a></li>
    @else
        <li class="disabled"><span>Next <i class="fa fa-angle-double-right"></i></span></li>
    @endif
</ul>