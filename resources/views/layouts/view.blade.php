@php
    $layout = $user->role->value === 'agent' || $user->role->value === 'owner'
        ? 'layouts.user_menu'
        : 'layouts.admin_menu';
@endphp

@extends($layout)

@extends($layout)

@section('content')

<div class="details_list">
    @yield('details')
</div>

@endsection