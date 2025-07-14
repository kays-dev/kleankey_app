@props([
'resource',
'item',
'primaryKey',
'showView' => true,
'showEdit' => true,
'showDelete' => true,
])

@php
$itemId = $item->{$primaryKey ?? 'id'} ?? null;
@endphp

<td class="data_actions table_data">
    <div class="data_buttons">
        @if($showView ?? true)
        <div class="data_button">
            <a href="{{ route($resource . '.show', $itemId) }}">
                <img src="{{ asset('images/icons/view.svg') }}" alt="Consulter">
            </a>
        </div>
        @endif

        @if($showEdit ?? true)
        <div class="data_button">
            <a href="{{ route($resource . '.edit', $itemId) }}">
                <img src="{{ asset('images/icons/edit.svg') }}" alt="Modifier">
            </a>
        </div>
        @endif

        @if($showDelete ?? true)
        <div class="data_button">
            <form action="{{ route($resource . '.destroy', $itemId) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete" onclick="">
                    <img src="{{ asset('images/icons/delete.svg') }}" alt="Supprimer">
                </button>
            </form>
        </div>
        @endif
    </div>
</td>