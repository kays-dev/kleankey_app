<td class="data_actions">

    @if($showView ?? true)
    <div class="data_button">
        <a href="{{ route($resource . '.show', $item->{$primaryKey ?? 'id'}) }}">
            <img src="{{ asset('images/icons/view.svg') }}" alt="Consulter">
        </a>
    </div>
    @endif

    @if($showEdit ?? true)
    <div class="data_button">
        <a href="{{ route($resource . '.edit', $item->{$primaryKey ?? 'id'}) }}">
            <img src="{{ asset('images/icons/edit.svg') }}" alt="Modifier">
        </a>
    </div>
    @endif

    @if($showDelete ?? true)
    <div class="data_button">
        <form action="{{ route($resource . '.destroy', $item->{$primaryKey ?? 'id'}) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete" onclick="">
                <img src="{{ asset('images/icons/delete.svg') }}" alt="Supprimer">
            </button>
        </form>
    </div>
    @endif
</td>