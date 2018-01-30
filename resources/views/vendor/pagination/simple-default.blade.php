@if ($paginator->hasPages())
    <ul class="paginator">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li style="float:left;" class="disabled"><span><上一页/</span></li>
        @else
            <li style="float:left;" ><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><上一页/</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li style="float:left;" ><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页></a></li>
        @else
            <li style="float:left;" class="disabled"><span>下一页></span></li>
        @endif
    </ul>
@endif
