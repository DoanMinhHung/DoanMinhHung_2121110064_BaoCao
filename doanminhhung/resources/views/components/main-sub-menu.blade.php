@if (count($menus)>0)
<li><a href="{{ $menurow->link }}"> {{ $menurow->name }}</a>
    <ul class="submenu">
        @foreach ($menus as $menu)
            <li><a class="" href="  {{ $menu->link }}"> {{ $menu->name }}</a></li>
        @endforeach
    </ul>
</li>
{{-- 
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href=" {{ $menurow->link }}" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ $menurow->name }}
    </a>
    <ul class="dropdown-menu1">
        @foreach ($menus as $menu)
            <li><a class="dropdown-item" href="  {{ $menu->name }}"> {{ $menu->name }}</a></li>
        @endforeach
    </ul>
</li> --}}
@else
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ $menurow->link }}">{{ $menurow->name }}</a>
    </li>
@endif
