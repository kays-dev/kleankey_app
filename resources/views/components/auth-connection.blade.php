@props([
'route',
'action',
])

<div class="nav_connect">
    <a href="{{ route($route) }}">
        {{ $action }}
    </a>
</div>