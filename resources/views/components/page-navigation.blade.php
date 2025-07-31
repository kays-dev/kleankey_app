@props([
'table'
])

<div class="pages">
    @if ($table->hasPages())
    @if ($table->onFirstPage())
    <div class="no_previous">
        <img src="" alt="page précédente" class="table_actions_icon">
    </div>
    @else
    <div class="previous_page">
        <a href="{{ $table->previousPageUrl() }}">
            <img src="" alt="page précédente" class="table_actions_icon">
        </a>
    </div>
    @endif
    @endif
    <div class="page_number">
        <p>{{$table->currentPage() . "  /  " . $table->lastPage() }}</p>
    </div>
    @if ($table->hasMorePages())
    @if ($table->onLastPage())
    <div class="no_next">
        <img src="" alt="page suivante" class="table_actions_icon">
    </div>
    @else
    <div class="next_page">
        <a href="{{ $table->nextPageUrl() }}">
            <img src="" alt="page suivante" class="table_actions_icon">
        </a>
    </div>
    @endif
    @endif
</div>