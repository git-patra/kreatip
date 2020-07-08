@php

use App\Menu;
use App\Submenu;
use App\Submenu_child;

$menus = Menu::all();
$submenus = Submenu::all();
$submenuchildren = Submenu_child::all();

@endphp

@section('sidenav')
<aside id="sidenav" class="sidenav">
    <nav class="sidebar-nav">
        <ul class="sidebarnav">
            <li class="sidebar-item">
                <a href="/dashboard" class="sidebar-link">
                    <i class="fas fa-home"></i> <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="list-divider">
            </li>
            @foreach ($menus as $menu)
            @if (Auth::user()->name === 'Patra')
            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-toggle="collapse" href="#{{ $menu->menu_name }}" role="button"
                    aria-expanded="false" aria-controls="{{ $menu->menu_name }}">
                    <div class="row row-cols-6">
                        <div class="col">
                            <i class="{{ $menu->icon }}"></i> <span
                                class="hide-menu"><strong>{{ $menu->menu_name }}</strong></span>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col arrow"><i class="fas fa-angle-up text-right"></i></div>
                    </div>
                </a>
                <ul class="collapse" id="{{ $menu->menu_name }}">
                    @if (Auth::user()->name === 'Patra')
                    @foreach ($submenus as $submenu)
                    @if ($submenu->menu_id === $menu->id)
                    <li class="sidebar-itemchild">
                        @php
                        $collapseid = str_replace(' ', '', $submenu->submenu_name);
                        @endphp
                        @if ($submenu->a_href === 'javascript:void(0)')
                        <a class="sidebar-link collapsed" data-toggle="collapse" href="#{{ $collapseid }}" role="button"
                            aria-expanded="false" aria-controls="{{ $submenu->submenu_name }}">
                            <div class="row row-cols-6">
                                <div class="col">
                                    <i class="{{ $submenu->icon }}"></i> <span
                                        class="hide-menu"><strong>{{ $submenu->submenu_name }}</strong></span>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col arrow"><i class="fas fa-angle-up text-right"></i></div>
                            </div>
                        </a>
                        <ul class="collapse" id="{{ $collapseid }}">
                            <li class="sidebar-subitemchild">
                                @foreach ($submenuchildren as $child)
                                <a class="sidebar-link pl-5" href="{{ $child->a_href }}" aria-expanded="false">
                                    <i class="{{ $child->icon }}"></i>
                                    <span class="hide-menu">{{ $child->child_name }}</span>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                        @else
                        <a class="sidebar-link pl-5" href="{{ $submenu->a_href }}" aria-expanded="false">
                            <i class="{{ $submenu->icon }}"></i>
                            <span class="hide-menu">{{ $submenu->submenu_name }}</span>
                        </a>
                        @endif
                    </li>
                    @endif
                    @endforeach
                    @else
                    @foreach ($submenus as $submenu)
                    @if ($submenu->menu_id === $menu->id)
                    @if ($submenu->icon === 'fas fa-file-alt' || $submenu->icon === 'far fa-user' || $submenu->icon ===
                    'fas fa-key')
                    <li class="sidebar-itemchild">
                        <a class="sidebar-link pl-5" href="{{ $submenu->a_href }}" aria-expanded="false">
                            <i class="{{ $submenu->icon }}"></i>
                            <span class="hide-menu">{{ $submenu->submenu_name }}</span>
                        </a>
                    </li>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </ul>
            </li>
            @else
            @if (!($menu->menu_name === 'Landing'))
            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-toggle="collapse" href="#{{ $menu->menu_name }}" role="button"
                    aria-expanded="false" aria-controls="{{ $menu->menu_name }}">
                    <div class="row row-cols-6">
                        <div class="col">
                            <i class="{{ $menu->icon }}"></i> <span
                                class="hide-menu"><strong>{{ $menu->menu_name }}</strong></span>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col arrow"><i class="fas fa-angle-up text-right"></i></div>
                    </div>
                </a>
                <ul class="collapse" id="{{ $menu->menu_name }}">
                    @if (Auth::user()->name === 'Patra')
                    @foreach ($submenus as $submenu)
                    @if ($submenu->menu_id === $menu->id)
                    <li class="sidebar-itemchild">
                        @php
                        $collapseid = str_replace(' ', '', $submenu->submenu_name);
                        @endphp
                        @if ($submenu->a_href === 'javascript:void(0)')
                        <a class="sidebar-link collapsed" data-toggle="collapse" href="#{{ $collapseid }}" role="button"
                            aria-expanded="false" aria-controls="{{ $submenu->submenu_name }}">
                            <div class="row row-cols-6">
                                <div class="col">
                                    <i class="{{ $submenu->icon }}"></i> <span
                                        class="hide-menu"><strong>{{ $submenu->submenu_name }}</strong></span>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col arrow"><i class="fas fa-angle-up text-right"></i></div>
                            </div>
                        </a>
                        <ul class="collapse" id="{{ $collapseid }}">
                            <li class="sidebar-subitemchild">
                                @foreach ($submenuchildren as $child)
                                <a class="sidebar-link pl-5" href="{{ $child->a_href }}" aria-expanded="false">
                                    <i class="{{ $child->icon }}"></i>
                                    <span class="hide-menu">{{ $child->child_name }}</span>
                                </a>
                                @endforeach
                            </li>
                        </ul>
                        @else
                        <a class="sidebar-link pl-5" href="{{ $submenu->a_href }}" aria-expanded="false">
                            <i class="{{ $submenu->icon }}"></i>
                            <span class="hide-menu">{{ $submenu->submenu_name }}</span>
                        </a>
                        @endif
                    </li>
                    @endif
                    @endforeach
                    @else
                    @foreach ($submenus as $submenu)
                    @if ($submenu->menu_id === $menu->id)
                    @if ($submenu->icon === 'fas fa-file-alt' || $submenu->icon === 'far fa-user' || $submenu->icon ===
                    'fas fa-key')
                    <li class="sidebar-itemchild">
                        <a class="sidebar-link pl-5" href="{{ $submenu->a_href }}" aria-expanded="false">
                            <i class="{{ $submenu->icon }}"></i>
                            <span class="hide-menu">{{ $submenu->submenu_name }}</span>
                        </a>
                    </li>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @endforeach

        </ul>
    </nav>
</aside>
@endsection