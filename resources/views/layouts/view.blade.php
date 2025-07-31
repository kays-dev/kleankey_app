@php
    $layout = 'layouts.admin_menu';
@endphp

@extends($layout)

@section('content')

<div class="details_list">
    @yield('details')
</div>

@endsection