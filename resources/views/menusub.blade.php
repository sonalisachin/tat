@if ((count($menu->children) > 0) AND ($menu->parent_id > 0))
<li class="nav-item dropdown">
    <a href="{{ url($menu->slug) }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $menu->title }}
        @if(count($menu->children) > 0) 
        <i class="fa fa-caret-right"></i>
        @endif
    </a>
    @else
<li class="nav-item @if($menu->parent_id === 0 && count($menu->children) > 0) dropdown @endif">
    <a href="{{ url($menu->slug) }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $menu->title }} 
        @if(count($menu->children) > 0) 
            <i class="fa fa-caret-down"></i>
        @endif
    </a>
    @endif
    @if (count($menu->children) > 0)
    <ul class="@if($menu->parent_id !== 0 && (count($menu->children) > 0)) submenu @endif dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($menu->children as $menu)
        @include('menusub', $menu)
        @endforeach
    </ul>
    @endif
</li>